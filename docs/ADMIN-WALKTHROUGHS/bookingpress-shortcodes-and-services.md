# Walkthrough — BookingPress (shortcodes & services)

## Where BookingPress is used

This site embeds booking forms using BookingPress shortcodes like:

- `[bookingpress_form service_id="1"]`
- `[bookingpress_form service_id="2"]`

Some shortcodes are:

- **Hardcoded in page templates** (developer edit required to change)
- **Stored in ACF fields** (editor can change in the post/page edit screen)

## Update a BookingPress service/form

1. Go to BookingPress in the WordPress admin menu.
2. Locate the service used by your form (confirm its ID).
3. Update the service settings and save.

## Update a shortcode stored in ACF (editor editable)

Examples of places where the shortcode is editable:

- Fleet posts (`Fleets → Edit`) → ACF **BookingPress Shortcode**
- Bespoke Tour posts (`Bespoke Tours → Edit`) → ACF **BookingPress Shortcode**
- Fleet Booking page template (`Pages → Fleet Booking`) → ACF **BookingPress Shortcode**

Steps:

1. Open the relevant post/page in admin.
2. Find the ACF field **BookingPress Shortcode**.
3. Paste the new shortcode (keep the brackets).
4. Update/Publish.

## Verify

- Open the page and confirm the booking form loads.

