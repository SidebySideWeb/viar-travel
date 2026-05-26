# ViaR Travel — Content Editor Manual (WordPress Admin)

This guide is written for non-technical editors. It explains **where each website element is edited in WordPress admin**, what fields affect what parts of the website, and how to verify your changes.

## Quick “Where do I edit this?” map

- **Site logo (header + footer)**: `Appearance → Customize → Site Identity → Logo`
- **Footer logo subtitle + schema tagline**: `Appearance → Customize → ViaR Footer Content → Logo Subtitle (footer & schema)`
- **Footer phone/email/copyright/tagline**: `Appearance → Customize → ViaR Footer Content`
- **Menus (Header, Footer, Legal, Client Portal)**: `Appearance → Menus`
- **Homepage sections**: `Pages → Home` (ACF fields “ViaR Hero Content”)  
  - Optional override: use the page editor blocks (see “Editor sections override” below)
- **Bespoke Tours listing page**: `Pages → Bespoke Tours` (ACF Hero fields)
- **VIP Transfers page**: `Pages → VIP Transfers` (mostly hardcoded layout + Fleet posts feed)
- **Fleet items**: `Fleets → Add New / Edit` (custom post type)
- **Bespoke tour items**: `Bespoke Tours → Add New / Edit` (custom post type)
- **Booking forms**: BookingPress plugin (plus shortcodes stored in ACF fields)
- **Contact form**: WPForms plugin (`wpforms id="15"`) on Contact page template
- **SEO + Schema**: Rank Math plugin (plus theme adds Organization data)

## Important concept: “Editor sections override”

Many templates in this theme support an override:

- If the page has meaningful block content in the WordPress editor, the theme will **render your editor content as full-width sections** and skip the template’s “designed layout”.
- If the editor is empty (or basically empty), the theme will render the “designed layout” and pull values from ACF fields.

**Rule of thumb**

- If you want to use the theme’s designed layout: keep the page editor mostly empty and edit the ACF fields.
- If you want a custom one-off layout: add content blocks to the page editor (this becomes the page).

## Global editing standards (recommended)

### Text & formatting

- Use sentence case for normal text; use CAPS only for short labels (eyebrows).
- Keep hero descriptions short (1–3 lines on desktop).
- Avoid adding multiple spaces / line breaks to “force” design.

### Images (quality + size)

- Use high-resolution images (at least 2000px wide for hero images).
- Prefer `.jpg` / `.webp` for photos; `.png` only when transparency is required.
- Always set **Alt text** in Media Library for SEO and accessibility.
- Keep file sizes reasonable (ideally < 300–500 KB per image if possible).

### Links

- Prefer internal links (pick pages from link picker) to avoid broken URLs.
- After editing links, click them on the live site to confirm they work.

## 1) Site identity: logo & favicon

### Change the site logo (header + footer)

1. Go to `Appearance → Customize → Site Identity`.
2. Set **Logo**.
3. Publish.
4. Verify on the live site:
   - Header logo (top of every page)
   - Footer logo (bottom of every page)

### Change the favicon (Site Icon)

1. Go to `Appearance → Customize → Site Identity`.
2. Set **Site Icon** (WordPress will crop).
3. Publish.

## 2) Footer content (including schema tagline)

### Edit the subtitle under the footer logo (and Google schema slogan)

1. Go to `Appearance → Customize → ViaR Footer Content`.
2. Edit **Logo Subtitle (footer & schema)**.
3. Publish.
4. Verify:
   - Footer subtitle text under the logo
   - Optional: check schema using Rank Math / Rich Results tool

### Edit footer phone and email

1. Go to `Appearance → Customize → ViaR Footer Content`.
2. Edit:
   - **Concierge Phone**
   - **Concierge Email**
3. Publish.
4. Verify footer contact line.

### Edit footer copyright

1. Go to `Appearance → Customize → ViaR Footer Content`.
2. Edit **Copyright Text**.
3. Publish.

### Edit footer tagline (small italic line)

1. Go to `Appearance → Customize → ViaR Footer Content`.
2. Edit **Footer Tagline**.
3. Publish.

## 3) Menus (header/footer/legal/client portal)

This theme uses these menu locations:

- **Primary Menu** (header)
- **Footer Menu** (footer “Explore”)
- **Legal Menu** (footer “Legal”)
- **Client Portal Menu**

### Edit a menu item (rename / reorder / add/remove)

1. Go to `Appearance → Menus`.
2. Select the menu you want to edit (e.g. “Primary Menu”).
3. Make changes:
   - Drag to reorder
   - Expand an item to rename it
   - Add pages from the left panel
4. Save.
5. Verify on the live site (header or footer).

## 4) Pages (ACF hero fields + optional editor override)

Most “designed pages” read hero fields from ACF:

- **Hero Eyebrow**
- **Hero Title**
- **Hero Description**
- **Hero Image**
- **Hero CTA Label**
- **Hero CTA URL**
- Some pages also use **Card / Secondary Image**

### Edit a page using ACF fields (designed layout)

1. Go to `Pages`.
2. Open the page (e.g. “Home”, “About Us”, “Bespoke Tours”, “VIP Transfers”).
3. Scroll to the ACF fields group (usually named “ViaR Hero Content”).
4. Update the fields.
5. Click **Update**.
6. Verify on the live page.

### Use the editor override (custom layout)

1. Go to `Pages` and open the page.
2. In the WordPress editor, add blocks (Headings, Images, Columns, etc.).
3. Click **Update**.
4. Verify: the page will now render your editor blocks as the main content sections.

## 5) Homepage (“Home” page)

The homepage is the page with slug `home` and is set as the static front page.

### Homepage editable elements (ACF)

Edit in `Pages → Home`:

- Hero title/description/image/CTA
- “Explore our trips” label + title
- Zigzag row 1: label/title/description/CTA label + URL + image
- Zigzag row 2: label/title/description/CTA label + URL + image
- “ViaR standard” label/title + 3 items (title + description)
- Testimonials label/title + 2 testimonials (quote + author)

### Homepage tours carousel content

The carousel pulls from published **Bespoke Tour** posts:

- Title (post title)
- Excerpt (post excerpt)
- Card image (ACF “Tour Card Image”)
- Meta label: first Region + first Experience Type taxonomy term (if set)

To update carousel items: edit `Bespoke Tours` posts.

## 6) Bespoke Tours (custom post type)

### Create / edit a bespoke tour

1. Go to `Bespoke Tours`.
2. Add new or edit an existing tour.
3. Fill:
   - **Title**
   - **Excerpt** (used on listings)
   - **Featured image** (if you want; listing uses Tour Card Image)
4. Fill the ACF group “ViaR Bespoke Tour Fields”:
   - Listing: **Tour Card Image**
   - Hero & Introduction: hero image, collection label, intro title/lead/body
   - At a Glance: duration/location/pace/best season
   - Curated Experiences: section label/title, experiences 1–3 (title/description/image)
   - Quote: pull quote + attribution
   - Inquiry CTA: title/description/button label + URL, brochure file, CTA background texture
   - Booking: optional BookingPress shortcode
5. Set taxonomy terms (optional but recommended):
   - Regions
   - Experience Types
6. Publish/Update and verify:
   - Tours listing page shows the card correctly
   - Single tour page shows sections correctly

## 7) Fleet (custom post type)

### Create / edit a fleet item

1. Go to `Fleets`.
2. Add new or edit.
3. Fill:
   - **Title**
   - **Excerpt** (used on VIP Transfers listing cards)
4. Fill ACF fields (“ViaR Fleet Post Fields”):
   - Fleet Card Label
   - Fleet Card Image
   - Fleet Hero Image (Single Page)
   - BookingPress Shortcode (for booking form on the single fleet page)
5. Publish/Update and verify on:
   - VIP Transfers page (fleet grid)
   - Single fleet page

## 8) Booking forms (BookingPress)

Booking areas on the site are rendered via BookingPress shortcodes, for example:

- `[bookingpress_form service_id="1"]` (commonly Transfers/Fleet)
- `[bookingpress_form service_id="2"]` (commonly Tours)

### Update BookingPress forms/services

1. Go to BookingPress in the WordPress admin.
2. Edit the service/form you need.
3. Confirm the **service ID** used in the shortcode still matches the correct service.
4. Verify the page that contains the form.

Where the shortcode is stored:

- Some pages include the shortcode directly inside the template (developer change required).
- Some pages/posts store it in ACF fields (editor editable):
  - Fleet single: ACF “BookingPress Shortcode”
  - Fleet booking page template: ACF “BookingPress Shortcode”
  - Tour single: ACF “BookingPress Shortcode”

## 9) Contact form (WPForms)

The Contact page template embeds:

- `[wpforms id="15" title="false"]`

### Edit the contact form fields / notifications

1. Go to `WPForms → All Forms`.
2. Find the form with ID **15**.
3. Edit:
   - Fields
   - Notifications (where emails go)
   - Confirmations
4. Save and test the Contact page form submission.

## 10) SEO + Schema (Rank Math + theme additions)

### Page-level SEO

Use Rank Math meta boxes on Pages/Posts to edit:

- SEO title
- Meta description
- Social previews

### Organization schema

The theme adds/merges Organization data for Rank Math, including:

- Organization type: TravelAgency
- Name + URL from WordPress settings
- **Logo** from the site logo
- **Slogan + Description** from “Logo Subtitle (footer & schema)”
- Telephone/email from Customizer footer fields

If you change logo subtitle, phone, or email in Customizer, it can affect schema output.

## Troubleshooting

### “I updated fields but the page didn’t change”

- Clear cache (plugin cache / server cache / browser cache).
- Confirm you edited the correct page (slug matches).
- If you added block content to the page editor, you may have triggered the **editor override** (the page is now using your editor blocks instead of the designed layout).

### “Tours/Fleet items aren’t showing”

- Ensure the posts are **Published** (not Draft).
- Ensure there is at least one item published.
- For Tours filters: make sure Regions/Experience Types terms exist and are assigned.

### “The Contact page phone/email is different than the footer”

- The Contact page has some hardcoded contact info in the template. If you want it to match the footer Customizer fields, that’s a small developer update.

