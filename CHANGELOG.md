# Changelog

All Notable changes to `omnipay-ecpay` will be documented in this file

## Unreleased

### Added
- BNPL (無卡分期) payment support for `PurchaseRequest`
- Test coverage for ATM and FlexibleInstallment (30N credit installment) purchase scenarios, which were previously untested even though the underlying code already supported them

### Changed
- Default `PaymentType` now falls back to `aio` when not explicitly set
