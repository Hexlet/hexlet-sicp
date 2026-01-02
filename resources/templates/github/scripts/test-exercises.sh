#!/bin/bash

# SICP Exercise Test Runner
# Runs tests on changed exercise files

set -e
set -o pipefail

echo "🔍 Checking for changed exercise solution files..."

if [ -n "$GITHUB_EVENT_NAME" ]; then
  if [ "$GITHUB_EVENT_NAME" = "pull_request" ]; then
    CHANGED_FILES=$(git diff --name-only "$GITHUB_BASE_REF" HEAD | grep 'exercise-.*/solution\.rkt$' || true)
  else
    CHANGED_FILES=$(git diff --name-only HEAD^ HEAD | grep 'exercise-.*/solution\.rkt$' || true)
  fi
else
  CHANGED_FILES=$(git diff --name-only HEAD | grep 'exercise-.*/solution\.rkt$' || true)
  if [ -z "$CHANGED_FILES" ]; then
    CHANGED_FILES=$(git diff --name-only HEAD^ HEAD | grep 'exercise-.*/solution\.rkt$' || true)
  fi
fi

if [ -z "$CHANGED_FILES" ]; then
  echo "✨ No exercise solutions were changed"
  exit 0
fi

echo "📝 Changed solution files:"
echo "$CHANGED_FILES"
echo ""

PASSED=0
FAILED=0
SKIPPED=0
FAILED_FILES=""

for solution_file in $CHANGED_FILES; do
  exercise_dir=$(dirname "$solution_file")
  test_file="$exercise_dir/test.rkt"

  if [ ! -f "$solution_file" ]; then
    echo "⏭️  Skipping $exercise_dir (solution deleted)"
    SKIPPED=$((SKIPPED + 1))
    continue
  fi

  if [ ! -f "$test_file" ]; then
    echo "⏭️  Skipping $exercise_dir (no test file)"
    SKIPPED=$((SKIPPED + 1))
    continue
  fi

  if grep -q "Write your solution here" "$solution_file" && ! grep -q "^(define " "$solution_file"; then
    echo "⏭️  Skipping $exercise_dir (no solution yet)"
    SKIPPED=$((SKIPPED + 1))
    continue
  fi

  echo "🧪 Testing $exercise_dir"

  TEMP_OUTPUT=$(mktemp)

  if raco test "$test_file" 2>&1 | tee "$TEMP_OUTPUT"; then
    if grep -qE "unbound identifier|undefined|expected a|read-syntax:|module declaration|check-|Error:" "$TEMP_OUTPUT"; then
      if grep -q "unbound identifier" "$TEMP_OUTPUT"; then
        ERROR_TYPE="unbound identifier"
      elif grep -q "expected a" "$TEMP_OUTPUT"; then
        ERROR_TYPE="syntax error"
      elif grep -q "module declaration" "$TEMP_OUTPUT"; then
        ERROR_TYPE="missing #lang declaration"
      elif grep -q "check-" "$TEMP_OUTPUT"; then
        ERROR_TYPE="test assertion failed"
      else
        ERROR_TYPE="error"
      fi
      echo "❌ FAILED: $exercise_dir ($ERROR_TYPE)"
      FAILED=$((FAILED + 1))
      FAILED_FILES="$FAILED_FILES\n  - $exercise_dir ($ERROR_TYPE)"
    else
      echo "✅ PASSED: $exercise_dir"
      PASSED=$((PASSED + 1))
    fi
  else
    echo "❌ FAILED: $exercise_dir (process error)"
    FAILED=$((FAILED + 1))
    FAILED_FILES="$FAILED_FILES\n  - $exercise_dir (process error)"
  fi

  rm -f "$TEMP_OUTPUT"
  echo ""
done

echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
echo "📊 Test Summary:"
echo "   ✅ Passed:  $PASSED"
echo "   ❌ Failed:  $FAILED"
echo "   ⏭️  Skipped: $SKIPPED"
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"

if [ $FAILED -gt 0 ]; then
  echo ""
  echo "❌ Failed exercises:"
  echo -e "$FAILED_FILES"
  echo ""
  echo "💡 Tip: Fix the errors above and commit again"
  exit 1
fi

echo ""
echo "✨ All tests passed!"
exit 0
