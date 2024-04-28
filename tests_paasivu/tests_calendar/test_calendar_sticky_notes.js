const { Builder, By, Key, until } = require('selenium-webdriver');
const assert = require('assert');
const CHROME_EXE_PATH = '/Users/riina/Documents/Ohjelmointi/Selenium_testing/webdrivers/chromedriver';


describe('Calendar sticky notes', () => {
  let driver;

  var doesNoteExist = async (testText) => {
    let noteExists;
    try {
      await driver.findElement(By.xpath("//li[text() = '" + testText + "']"));
      noteExists = true;
    } catch(error) {
      noteExists = false;
    }
    return noteExists;
  }


  beforeEach(async () => {
    // use Chrome
    driver = await new Builder().forBrowser('chrome', executable_path=CHROME_EXE_PATH).build();

    // Go to "Elämänhallinta" and login
    try {
      driver.get("http://localhost:8080/Paasivu_new/login");
      await driver.findElement(By.name('username')).sendKeys('correct username');
      await driver.findElement(By.name('password')).sendKeys('correct password', Key.RETURN);
    } catch(error) {
      throw error;
    }
  });

  describe('If there are no sticky notes', () => {
    it('should say "Ei merkintöjä."', async () => {
      let i = 0;
      while (i<10) {
        let stickyNoteBox = await driver.findElement(By.xpath('//div[@class="sticky_box"]'));
        try {
          // Make sure that if there are notes, they are under sticky notes and not in daily notes
          var deleteButton = await stickyNoteBox.findElement(By.className('delete_button'));
          await deleteButton.click();
          i =+ 1;
        } catch(error) {
          break;
        }
      }
      let testText = 'Ei merkintöjä.';
      let noteExists;
      try {
        let text = await driver.findElement(By.xpath("//p[text() = '" + testText + "']"));
        let stickyNoteBox = await text.findElement(By.xpath('//p/parent::div[@class="sticky_box"]'));
        noteExists = true;
      } catch(error) {
        noteExists = false;
      }
      assert.equal(noteExists, true);
    });
  });

  describe('Try adding sticky calendar note', () => {
    it('should add the note to the notes list', async () => {
      try {
        let testText = 'test sticky text box';
        await driver.findElement(By.name('day0_text')).sendKeys(testText);
        await driver.findElement(By.name('day0_button')).click();
        let exists = await doesNoteExist(testText);
        assert.equal(exists, true);
      } catch(error) {
        throw error;
      }
    });
  });

  describe('Try deleting sticky calendar note', () => {
    it('should delete the note in the notes list', async () => {
      try {
        let testText = 'test sticky text box';
        try {
          await driver.findElement(By.xpath("//li[text() = '" + testText + "']"));
        } catch(error) {
          await driver.findElement(By.name('day0_text')).sendKeys(testText);
          await driver.findElement(By.name('day0_button')).click();
          console.log('Most likely there were no notes beforehand so a note was created.\nThe error should be "NoSuchElementError" and here is the actual error:\n\n', error);
        }
        await driver.findElement(By.xpath("//a[@class='button_link']")).click();
        let exists = await doesNoteExist(testText);
        assert.equal(exists, false);
      } catch(error) {
        throw error;
      }
    });
  });

  afterEach(async () => driver.quit());

});
