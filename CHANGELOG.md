# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/), and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

---

## [Unreleased]

## [0.0.2] - 2025-05-24

### Added

- New `LexiconError` and `LexiconMessage` enumerable for encapsulating variables.
- New `TableStructure` abstract base class for managing table structures.
- New `migrations`, `seeders`, `models` and `table-structure` for database logic.
- New `Repository` abstract base class for managing database records.
- New `DeleteInterface`, `FindInterface`, `ReadInterface`, `UpdateInterface` and `WriteInterface` interfaces for `Repository`.
- New `Data` abstract base class for working with data properties.
- New `FromArrayInterface`, `HasAttributesInterface` and `HasOptionsInterface` interfaces for `Data`.
- New `Lexicon` facade, the `Service` and `helpers` for this package.
- New `FileIndicators` class and the `FileIndicatorType` enum for managing indicators.
- New `LexiconPublisher` and `LexiconInstaller` for the installation logic.
- New `LexiconInstall` and `LexiconInstallConfig` console commands.

---

## [0.0.1] - 2025-05-12

### Added

- Initial commit with basic setup.
- New configuration options: `strict_mode`, `driver`, `directory`, `database_prefix`, and `common_context`.
- Created `LexiconServiceProvider` for package registration.
- New `LexiconConfig` enum for encapsulating configuration options.
