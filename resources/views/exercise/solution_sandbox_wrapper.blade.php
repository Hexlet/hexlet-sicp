#lang racket
(require racket/sandbox)

(define base-module-eval
  (make-module-evaluator '(module m racket/base
                            (require rackunit)
                            ;;; BEGIN
{!! $solution !!}
                            ;;; END
{!! $tests !!}
                            )
                         )
  )
