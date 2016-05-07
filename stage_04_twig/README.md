# Retr0Static : Stage 04
-----

## Enhancements

1. Twig templating
...twig/twig added to composer.json
...Twig templates created:
..*Base template - Removes need for header, nav and footer PHP templates.
..*Insight page.
..*Login form.
..*Login error message.
..*News page.
..*Registration form.
..*Screen page.
..*Shop page.
..*Welcome message shown upon successful registration.
..*Website Landing page.

2. Validation
...User registration form is successfully validated before database record is created.

3. Unit Tests
...phpunit/phpunit added to composer.json
...phpunit.xml configured to run tests and generate a test coverage report.
...Coverage report is found in coverage/ folder.
...Unit Tests added for:
..*User class : 100% coverage
..*UserRepository class : 100% coverage
..*cmd: phpunit from Retr0static/stage_0....

4. Logging
...monolog/monolog added to composer.json
...php-console/php-console added to composer.json
...Logging added to debug registration process.

5. PHPDocumentor
...Installed phpdoc/phpdoc using Composer.
...Created basic documentation in docs/ folder.
...Commands:
..*composer exec "phpdoc -d ./src -t ./docs"