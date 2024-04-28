const { Builder, By, Key, until } = require('selenium-webdriver');
const assert = require('assert');
const CHROME_EXE_PATH = '/Users/riina/Documents/Ohjelmointi/Selenium_testing/webdrivers/chromedriver';


describe('Logout button', () => {
  let driver;

  before(async () => {
    // use Chrome
    driver = await new Builder().forBrowser('chrome', executable_path=CHROME_EXE_PATH).build();

    // Go to login page and log in with correct credentials
    driver.get("http://localhost:8080/Paasivu_new/login");
    await driver.findElement(By.name('username')).sendKeys('correct username');
    await driver.findElement(By.name('password')).sendKeys('correct password', Key.RETURN);
    // Verify login
    try {
      let actualUrl = await driver.getCurrentUrl();
      let expectedUrl = "http://localhost:8080/Paasivu_new/calendar";
      assert.equal(expectedUrl, actualUrl);
    } catch(error) {
      throw error;
    }
  });

  it('should log out', async () => {
    // Click log out button
    await driver.findElement(By.id('login_info')).click();
    // Check that the logout button is gone
    let exists;
    try {
      await driver.findElement(By.id('login_info'));
      exists = true;
    } catch(error) {
      exists = false;
    }
    assert.equal(exists, false);
  });

  after(async () => driver.quit());

});
