# IWAS Commerce Platform

A WordPress + WooCommerce commerce platform intended for a US-first dropshipping launch with a broad, category-neutral brand.

## Launch strategy

- Initial department: Beauty & Hair → protective hair and wig accessories.
- Initial market: United States.
- Fulfilment: WooCommerce connected to CJdropshipping; prefer US warehouse inventory where practical.
- Customer payments: WooCommerce + Paystack initially, subject to account eligibility and live-gateway testing.
- Future department: Tech & Gadgets, beginning with lower-risk non-powered accessories.
- Brand name: intentionally not hard-coded. WordPress Site Title controls the storefront brand.

## Repository layout

- `wp-content/themes/iwas-commerce` — storefront theme.
- `wp-content/plugins/iwas-commerce-core` — commerce/PWA/admin utilities.
- `docker-compose.yml` — free local WordPress/MariaDB development stack.
- `docs/` — architecture, setup and launch material.
- `scripts/validate.sh` — syntax and project checks.

## Local start

1. Copy `.env.example` to `.env`.
2. Run `docker compose up -d`.
3. Open `http://localhost:8080` and complete the WordPress installer.
4. Activate **IWAS Commerce**.
5. Activate **IWAS Commerce Core**.
6. Install WooCommerce.
7. Install the official Paystack WooCommerce extension.
8. Connect CJdropshipping through its current WooCommerce integration workflow.

This repository does not contain live credentials, supplier credentials, customer data or payment secrets.

## Production note

The currently connected free WordPress.com sites cannot run the required WooCommerce plugin stack. Production requires a WordPress environment that permits plugins and provides persistent PHP/MySQL or MariaDB hosting.
