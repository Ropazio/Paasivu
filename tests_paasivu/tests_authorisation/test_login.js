const { Builder, By, Key, until } = require('selenium-webdriver');
const assert = require('assert');

@test
describe('Login form', () => {
  let driver;

  beforeEach(async () => {
    // use Chrome
    const driver = await new Builder().forBrowser('chrome').build();

    // Go to login page and find the username and password elements
    driver.get('https://ropaz.dev/pages/login_page.php');
    const usernameField = await driver.findElement(By.name('username'));
    const passwordField = await driver.findElement(By.name('password'));
  });

  describe('Use username only', () => {
    it('login should fail', async () => {
      try {
        usernameField.sendKeys('username only', Key.RETURN);
        const actualUrl = await window.location.href;
        const expectedUrl = 'https://ropaz.dev/pages/login_page.php?error=login_failed';
        assert.equal(expectedUrl, actualUrl);
      } catch(error) {
          console.log(error);
      }
      }
  });

  describe('Use password only', () => {
    it('login should fail', async () => {
      try {
        usernameField.sendKeys('password only', Key.RETURN);
        const actualUrl = await window.location.href;
        const expectedUrl = 'https://ropaz.dev/pages/login_page.php?error=login_failed';
        assert.equal(expectedUrl, actualUrl);
      } catch(error) {
          console.log(error);
      }
    });
  });

  describe('Use incorrect username and password', () => {
    it('login should fail', async () => {
      try {
        usernameField.sendKeys('username only');
        usernameField.sendKeys('password only', Key.RETURN);
        const actualUrl = await window.location.href;
        const expectedUrl = 'https://ropaz.dev/pages/login_page.php?error=login_failed';
        assert.equal(expectedUrl, actualUrl);
      } catch(error) {
          console.log(error);
      }
    });
  });

  describe('Use correct username and password', () => {
    it('login should pass', async () => {
      try {
        usernameField.sendKeys('');
        usernameField.sendKeys('', Key.RETURN);
        const actualUrl = await window.location.href;
        const expectedUrl = 'https://ropaz.dev/pages/calendar.php';
        assert.equal(expectedUrl, actualUrl);
      } catch(error) {
          console.log(error);
      }
    });
  });

  after(async () => driver.quit());

});
