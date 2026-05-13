# ViaR Luxury Travel Theme

Fully automated WordPress theme generated from Stitch designs.

## Requirements

- WordPress 6.5+
- PHP 8.1+
- Plugins:
  - BookingPress Appointment Booking
  - Rank Math SEO
  - Advanced Custom Fields (free)

## Install Frontend Build Tools

```bash
npm install
npm run build
```

## Theme Activation Steps

1. Place this theme in `wp-content/themes/viar-luxury`.
2. In WordPress admin go to `Appearance -> Themes`.
3. Activate **ViaR Luxury Travel**.
4. Theme activation automatically creates all key pages and primary navigation.

## Auto-Created Pages

- Home (`/home`) set as front page
- About Us (`/about`)
- Transfer Availability (`/availability-results`)
- Bespoke Tours (`/bespoke-tours`)
- Availability Request (`/check-availability`)
- Private Client Access (`/client-access`)
- Client Transfer Dashboard (`/client-dashboard-vip-transfers`)
- Contact (`/contact`)
- Edit Transfer Details (`/edit-transfer-details`)
- Inquiry (`/inquiry`)
- Modify Journey (`/modify-journey-greek-aesthetic`)
- Our Story & Philosophy (`/our-story-philosophy`)
- Payment Confirmation (`/payment-confirmation`)
- Secure Booking Checkout (`/secure-booking`)
- VIP Concierge Dashboard (`/vip-dashboard-greek-aesthetic`)
- VIP Transfer Dashboard (`/vip-dashboard-transfers-only`)
- VIP Transfers (`/vip-transfers`)
- VIP Transfer Services (`/vip-transfers-services`)

## Menu Locations

- `primary`: auto-created and assigned on activation
- `client_portal`: auto-created for private portal flow
- `legal`: auto-created for checkout/legal links
- `footer`: available for optional customization


## Editable Navigation & Footer

- Menus are editable in `Appearance -> Menus`:
  - `Primary Menu` controls the site header navigation.
  - `Footer Menu` controls the footer Explore links.
  - `Legal Menu` controls footer legal links.
- Footer text/contact content is editable in `Appearance -> Customize -> ViaR Footer Content`.

## Dynamic Content (CPT)

- `Fleets` custom post type (`viar_fleet`)
  - Feeds `/vip-transfers` fleet cards automatically.
  - Each Fleet item opens its own detail page with BookingPress form.
  - Per-fleet BookingPress shortcode is editable in Fleet post fields.
- `Bespoke Tours` custom post type (`viar_bespoke_tour`)
  - Feeds `/bespoke-tours` cards automatically.
  - Filters are powered by taxonomies:
    - `Region` (`viar_tour_region`)
    - `Experience Type` (`viar_tour_experience_type`)
  - Each tour opens its own detail page with editable BookingPress shortcode.

## BookingPress Service IDs

- VIP Transfer form: `[bookingpress_form service_id="1"]`
- Bespoke Tours form: `[bookingpress_form service_id="2"]`

## Content Editing (Client Workflow)

- Install and activate **Advanced Custom Fields (free)**.
- Open any key page (`Home`, `Bespoke Tours`, `VIP Transfers`, `About`, `Contact`, `Inquiry`).
- Edit fields in the **ViaR Hero Content** box:
  - Hero Eyebrow
  - Hero Title
  - Hero Description
  - Hero CTA Label
  - Hero CTA URL
- Optional: use the normal WordPress editor content; anything added there renders as an additional branded content section below the hardcoded design.

## Performance Optimizations Included

- Output image optimization for raw template `<img>` tags (`loading`, `decoding`, and hero `fetchpriority`).
- Removed unnecessary WP frontend assets (emoji/oEmbed extras).
- Added font host preconnect hints.
- Tailwind rebuild with Stitch token config and required plugins.

## Notes

- Core page content is hardcoded in templates from Stitch HTML.
- Mobile stitch variants are not used as standalone templates.
- Private dashboard and booking flow pages redirect guests to `/client-access`.
- Run `npm run watch` during design iteration.
