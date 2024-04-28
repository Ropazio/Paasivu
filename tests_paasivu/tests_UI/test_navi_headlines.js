const { Builder, By, Key, until } = require('selenium-webdriver');
const assert = require('assert');
const CHROME_EXE_PATH = '/Users/riina/Documents/Ohjelmointi/Selenium_testing/webdrivers/chromedriver';


describe('Navi headline links', () => {
  let driver;
  let headline;
  let linkAddress;

  var testLink = async (headline, linkAddress) => {
    try {
      await driver.findElement(By.linkText(headline)).click();
      let actualUrl = await driver.getCurrentUrl();
      let expectedUrl = linkAddress;
      assert.equal(expectedUrl, actualUrl);
    } catch(error) {
      throw error;
    }
  }


  beforeEach(async () => {
    // use Chrome
    driver = await new Builder().forBrowser('chrome', executable_path=CHROME_EXE_PATH).build();

    // Go to ropaz.dev
    driver.get("http://localhost:8080/Paasivu_new/");
  });

  describe('Try pressing "Etusivu"', () => {
    it('should go to "Etusivu"', async () => {
      await testLink('Etusivu', "http://localhost:8080/Paasivu_new/");
    });
  });

  describe('Try pressing "Verkkoprojektit"', () => {
    it('should go to "Verkkoprojektit"', async () => {
      await testLink('Verkkoprojektit', "http://localhost:8080/Paasivu_new/coding_projects");
    });
  });

  describe('Try pressing "Askarteluprojektit"', () => {
    it('should go to "Askarteluprojektit"', async () => {
      await testLink('Askarteluprojektit', "http://localhost:8080/Paasivu_new/hobby_projects");
    });
  });

  describe('Try pressing "Elämänhallinta" without being signed in', () => {
    it('should go to login page', async () => {
      await testLink('Elämänhallinta', "http://localhost:8080/Paasivu_new/login");
    });
  });

  describe('Try pressing "Elämänhallinta" while signed in', () => {
    it('should go to "Elämänhallinta"', async () => {
      try {
        driver.get("http://localhost:8080/Paasivu_new/login");
        await driver.findElement(By.name('username')).sendKeys('correct username');
        await driver.findElement(By.name('password')).sendKeys('correct password', Key.RETURN);
        await driver.findElement(By.linkText('Etusivu')).click();
      } catch(error) {
        throw error;
      }
      await testLink('Elämänhallinta', "http://localhost:8080/Paasivu_new/calendar");
    });
  });

  afterEach(async () => driver.quit());

});
