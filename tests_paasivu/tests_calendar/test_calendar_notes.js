const { Builder, By, Key, until } = require('selenium-webdriver');
const assert = require('assert');
const CHROME_EXE_PATH = '/Users/riina/Documents/Ohjelmointi/Selenium_testing/webdrivers/chromedriver';


describe('Calendar notes', () => {
  let driver;

  beforeEach(async () => {
    // use Chrome
    driver = await new Builder().forBrowser('chrome', executable_path=CHROME_EXE_PATH).build();

    // Go to "Elämänhallinta" and login
    try {
      driver.get('http://localhost:8080/Paasivu/public_html/pages/login_page.php');
      await driver.findElement(By.name('username')).sendKeys('correct username');
      await driver.findElement(By.name('password')).sendKeys('correct password', Key.RETURN);
    } catch(error) {
      throw error;
    }
  });

  describe('Try adding general calendar note', () => {
    it('should add the note to the notes list', async () => {
      try {
        let testText = 'test sticky text box';
        await driver.findElement(By.name('day0_text')).sendKeys(testText);
        await driver.findElement(By.name('day0_button')).click();
        let noteExists;
        try {
          await driver.findElement(By.xpath("//li[text() = '" + testText + "']"));
          noteExists = true;
        } catch(error) {
          noteExists = false;
        }
        assert.equal(noteExists, true);
      } catch(error) {
        throw error;
      }
    });
  });

  describe('Try deleting general calendar note', () => {
    it('should delete the note in the notes list', async () => {
      try {
        let testText = 'test sticky text box';
        let noteExists;
        try {
          await driver.findElement(By.xpath("//li[text() = '" + testText + "']"));
        } catch(error) {
          await driver.findElement(By.name('day0_text')).sendKeys(testText);
          await driver.findElement(By.name('day0_button')).click();
          console.log('Most likely there were no notes beforehand so a note was created.\nThe error should be "NoSuchElementError" and here is the actual error:\n\n', error);
        }
        await driver.findElement(By.xpath("//a[@class='button_link']")).click();
        try {
          await driver.findElement(By.xpath("//li[text() = '" + testText + "']"));
          noteExists = true;
        } catch(error) {
          noteExists = false;
        }
        assert.equal(noteExists, false);
      } catch(error) {
        throw error;
      }
    });
  });

  afterEach(async () => driver.quit());

});