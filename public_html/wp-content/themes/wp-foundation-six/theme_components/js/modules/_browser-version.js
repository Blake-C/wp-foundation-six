import { detect } from 'detect-browser'

const browser = detect()

const browser_version = browser.version.split('.')
const browser_html_class = browser.name + '-' + browser_version[0]

document.querySelector('html').classList.add(browser_html_class)

export { browser }
