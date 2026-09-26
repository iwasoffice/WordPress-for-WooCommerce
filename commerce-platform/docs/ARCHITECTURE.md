# Architecture

## Core

WordPress is the CMS and application shell. WooCommerce owns products, carts, checkout, customers, orders, coupons, shipping and tax configuration. Business-specific presentation stays in the theme; business-specific data and behaviour stay in the core plugin.

## Integrations

Customer -> WooCommerce Checkout -> Paystack -> WooCommerce Order -> CJdropshipping -> Supplier -> Customer

Payment and supplier settlement remain separate. The supplier side must not be treated as a split payment from the customer checkout.

## Product strategy

Launch products belong to one coherent department: protective hair, wig-care, satin sleep and non-liquid styling accessories. Tech & Gadgets is structured as a second department but should remain unpublished until the first department is operationally stable.

## Data ownership

WooCommerce remains the system of record for customers and orders. Supplier identifiers are stored as product metadata. No supplier credential is stored in the theme.

## PWA

The core plugin exposes `/manifest.webmanifest` and `/iwas-sw.js`, with an offline page at `/offline/`. The storefront registers the service worker only over HTTPS or localhost.

## Growth path

1. Single department and single market.
2. Additional departments.
3. Hybrid inventory for winning products.
4. Additional fulfilment providers.
5. Native mobile wrappers only if store economics justify them.
