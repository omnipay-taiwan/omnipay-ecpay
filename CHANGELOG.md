# Changelog

All Notable changes to `omnipay-ecpay` will be documented in this file

## v1.1.10 - 2026-09-05

### Fixed
- Test suite no longer fails with "No PSR-17 response factory found" by requiring `nyholm/psr7` for dev
- CI dependency resolution kept installable on PHP 7.1 by relaxing the `nyholm/psr7` constraint to `^1.3`

### Changed
- CI matrix now also covers PHP 8.4 and 8.5

### Docs
- README description, usage examples, and this changelog now reflect the package's actual features instead of the omnipay-skeleton placeholder text

## v1.1.9 - 2025-11-29

### Added
- BNPL (無卡分期) payment support for `PurchaseRequest`
- Test coverage for ATM and FlexibleInstallment (30N credit installment) purchase scenarios, which were previously untested even though the underlying code already supported them

### Changed
- Default `PaymentType` now falls back to `aio` when not explicitly set
