# Contributing to Filament Navigation

Thank you for considering contributing to Filament Navigation! We appreciate your time and effort in making this package better.

## Code of Conduct

This project follows the [Contributor Covenant](https://www.contributor-covenant.org/) Code of Conduct. By participating, you are expected to uphold this code.

## How Can I Contribute?

### Reporting Bugs

If you find a bug, please create an issue on GitHub with:

- **Clear title and description**
- **Steps to reproduce** the issue
- **Expected behavior** vs **actual behavior**
- **Environment details**:
  - PHP version
  - Laravel version
  - Filament version
  - Package version
- **Code samples** or screenshots if applicable

### Suggesting Enhancements

We welcome feature requests! Please create an issue with:

- **Clear description** of the enhancement
- **Use case** - Why would this be useful?
- **Example implementation** (optional but helpful)
- **Screenshots or mockups** if applicable

### Pull Requests

1. **Fork the repository** and create your branch from `main`:
   ```bash
   git checkout -b feature/my-new-feature
   ```

2. **Install dependencies**:
   ```bash
   composer install
   npm install
   ```

3. **Make your changes**:
   - Write clear, self-documenting code
   - Follow existing code style
   - Add inline documentation for complex logic
   - Update relevant documentation files

4. **Test your changes**:
   ```bash
   composer test          # Run Pest tests
   composer test-coverage # Run tests with coverage
   vendor/bin/phpstan     # Run static analysis
   vendor/bin/pint        # Format code
   ```

5. **Commit your changes**:
   - Use clear, descriptive commit messages
   - Follow [Conventional Commits](https://www.conventionalcommits.org/) format:
     ```
     feat: add new separator style 'gradient'
     fix: resolve icon display issue in nested groups
     docs: update EXAMPLES.md with CRM example
     refactor: simplify NavigationBuilder logic
     test: add tests for external link handling
     ```

6. **Push to your fork** and submit a pull request:
   ```bash
   git push origin feature/my-new-feature
   ```

7. **Create the Pull Request** with:
   - **Clear title** following Conventional Commits
   - **Description** of changes and why they're needed
   - **Screenshots** or GIFs for UI changes
   - **Tests** that verify the changes work
   - **Documentation updates** if needed

## Development Guidelines

### Code Style

- Follow **PSR-12** coding standard
- Use **Laravel Pint** for automatic formatting:
  ```bash
  vendor/bin/pint
  ```

- Use **PHPStan** for static analysis:
  ```bash
  vendor/bin/phpstan
  ```

### Testing

- Write tests for all new features using **Pest**
- Ensure all tests pass before submitting PR:
  ```bash
  composer test
  ```

- Aim for high code coverage:
  ```bash
  composer test-coverage
  ```

### Documentation

When adding features, update:

- **README.md** - If it affects basic usage or installation
- **EXAMPLES.md** - If it adds new patterns or use cases
- **CHANGELOG.md** - Add entry under `[Unreleased]`
- **Inline code comments** - For complex logic
- **Config file comments** - If adding new configuration options

### Adding New Separator Styles

If you want to add new separator styles:

1. Add the style to the `match()` expression in `FilamentNavigationPlugin.php`:
   ```php
   $separatorLabel = match($style) {
       // ... existing styles
       'my-new-style' => '→ ✦ ← ✦ →',
   };
   ```

2. Update the configuration file `config/filament-navigation.php`:
   ```php
   | NEW CATEGORY:
   |   'my-new-style' → → ✦ ← ✦ →  (description)
   ```

3. Update `README.md` separator styles section

4. Add example usage in `EXAMPLES.md` if applicable

### Adding New Features

For larger features:

1. **Open an issue first** to discuss the feature
2. **Get feedback** from maintainers before starting work
3. **Break down** large PRs into smaller, reviewable chunks
4. **Write tests** that prove the feature works
5. **Update documentation** comprehensively

## Project Structure

```
packages/filament-navigation/
├── src/
│   ├── FilamentNavigationPlugin.php       # Main plugin class
│   └── FilamentNavigationServiceProvider.php  # Service provider
├── config/
│   └── filament-navigation.php            # Configuration file
├── tests/
│   ├── Pest.php                           # Pest configuration
│   └── ...                                # Test files
├── .github/
│   └── workflows/                         # CI/CD workflows
├── README.md                              # Main documentation
├── EXAMPLES.md                            # Usage examples
├── CHANGELOG.md                           # Version history
├── CONTRIBUTING.md                        # This file
├── LICENSE.md                             # MIT License
├── composer.json                          # Package dependencies
├── phpstan.neon.dist                      # Static analysis config
├── phpunit.xml.dist                       # Test configuration
└── pint.json                              # Code style rules
```

## Testing Locally

### Testing in Another Laravel Project

1. **Add local repository** to `composer.json`:
   ```json
   {
       "repositories": [
           {
               "type": "path",
               "url": "../filament-navigation"
           }
       ]
   }
   ```

2. **Require the package**:
   ```bash
   composer require shuxx/filament-navigation @dev
   ```

3. **Test your changes** in the Laravel app

4. **Publish config** to verify it works:
   ```bash
   php artisan vendor:publish --tag="filament-navigation-config"
   ```

### Running Tests

```bash
# Run all tests
composer test

# Run tests with coverage
composer test-coverage

# Run static analysis
vendor/bin/phpstan

# Format code
vendor/bin/pint

# Check formatting without changes
vendor/bin/pint --test
```

## Release Process

Maintainers will handle releases. The process involves:

1. Update `CHANGELOG.md` with release date
2. Create a git tag: `git tag v1.0.0`
3. Push tag: `git push --tags`
4. GitHub Actions will run tests and create release
5. Packagist will auto-update

## Questions?

If you have questions or need help:

- **Open an issue** on GitHub
- **Check existing issues** - your question might already be answered
- **Read the documentation** - README.md and EXAMPLES.md

## Recognition

All contributors will be credited in:
- **README.md** - Contributors section
- **Release notes** - Mentioned in CHANGELOG.md

Thank you for contributing to Filament Navigation! 🎉
