import { test, expect } from '@playwright/test';

test('saving new solution', async ({ page }) => {
  // Открываем страницу упражнения
  await page.goto('https://sicp.hexlet.io/ru/exercises/7');

  // Login
  await page.getByRole('link', { name: 'Вход' }).click();
  await page.getByRole('textbox', { name: 'Электронная почта' }).click();
  await page.getByRole('textbox', { name: 'Электронная почта' }).fill('test@test.com');
  await page.getByRole('textbox', { name: 'Пароль' }).click();
  await page.getByRole('textbox', { name: 'Пароль' }).fill('12345678');
  await page.getByRole('button', { name: 'Отправить' }).click();

  // Вводим решение в соответствующее поле
  await page.locator('.cm-content > div:nth-child(2)').click();
  await page.getByText('#| BEGIN (Введите свое решение) |##| END |#').fill('#| BEGIN (Введите свое решение) |#\nmy playwright solution\n#| END |#');
  await page.getByRole('button', { name: 'Сохранить' }).click();

  // Ищем подтверждение сохранения решения, используем регулярку
  await expect(page.getByText(/Решение сохранено: https:\/\/sicp\.hexlet\.io\/solutions\/\d+/)).toBeVisible({ timeout: 10000 });

  // Сделать скрин результата
  await page.screenshot({ path: './screenshots/new_solution.png', fullPage: true });
});