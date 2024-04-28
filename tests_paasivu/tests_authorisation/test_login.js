const { Builder, By, Key, until } = require('selenium-webdriver');
const assert = require('assert');
const CHROME_EXE_PATH = '/Users/riina/Documents/Ohjelmointi/Selenium_testing/webdrivers/chromedriver';


describe('Login form', () => {
  let driver;
  const expectedFailUrl = "http://localhost:8080/Paasivu_new/login?error=login_failed";

  beforeEach(async () => {
    // use Chrome
    driver = await new Builder().forBrowser('chrome', executable_path=CHROME_EXE_PATH).build();

    // Go to login page and find the username and password elements
    driver.get("http://localhost:8080/Paasivu_new/login");
  });

  describe('Use correct username only', () => {
    it('login should fail', async () => {
      try {
        await driver.findElement(By.name('username')).sendKeys('test username', Key.RETURN);
        let actualUrl = await driver.getCurrentUrl();
        assert.equal(expectedFailUrl, actualUrl);
      } catch(error) {
        throw error;
      }
    });
  });

  describe('Use correct password only', () => {
    it('login should fail', async () => {
      try {
        await driver.findElement(By.name('password')).sendKeys('test password', Key.RETURN);
        let actualUrl = await driver.getCurrentUrl();
        assert.equal(expectedFailUrl, actualUrl);
      } catch(error) {
        throw error;
      }
    });
  });

  describe('Use incorrect username and password', () => {
    it('login should fail', async () => {
      try {
        await driver.findElement(By.name('username')).sendKeys('incorrect username');
        await driver.findElement(By.name('password')).sendKeys('incorrect password', Key.RETURN);
        let actualUrl = await driver.getCurrentUrl();
        assert.equal(expectedFailUrl, actualUrl);
      } catch(error) {
        throw error;
      }
    });
  });

  describe('Use correct username and password', () => {
    it('login should pass', async () => {
      try {
        await driver.findElement(By.name('username')).sendKeys('correct username');
        await driver.findElement(By.name('password')).sendKeys('correct password', Key.RETURN);
        let actualUrl = await driver.getCurrentUrl();
        let expectedUrl = "http://localhost:8080/Paasivu_new/calendar";
        assert.equal(expectedUrl, actualUrl);
      } catch(error) {
        throw error;
      }
    });
  });

  afterEach(async () => driver.quit());

});
