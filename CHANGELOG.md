# Changelog

## v1.2 - 2026-06-08

- Adds a GitHub-hosted fallback for PHP 8.4 CI and release jobs when `BEPLY_GHA_RUNNER` is not available for the repository.
- Supersedes the cancelled `v1.1` validation run without moving the existing immutable tag.

## v1.1 - 2026-06-08

- Declares PHP 8.4 as the minimum supported runtime.
- Adds a PHP 8.4 compatibility scan across plugin source files in CI.
- Aligns release metadata for the PHP 8.4 validation pass.
