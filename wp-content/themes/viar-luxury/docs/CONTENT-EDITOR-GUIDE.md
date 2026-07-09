# ViaR Travel — Content Editor Manual

A complete, non-technical guide to editing **every** piece of content on
[viartravel.com](https://viartravel.com). Keep this open while you work.

- **Website:** https://viartravel.com
- **Admin login:** https://viartravel.com/wp-admin
- **Who this is for:** Content editors and site administrators. No coding required.

---

## Table of Contents

1. [Before You Start (Read This First)](#1-before-you-start-read-this-first)
2. [The Golden Rule of This Site](#2-the-golden-rule-of-this-site)
3. [How to Log In](#3-how-to-log-in)
4. [Quick Reference: Where Is Everything?](#4-quick-reference-where-is-everything)
5. [Homepage](#5-homepage)
6. [About Page](#6-about-page)
7. [VIP Transfers Page](#7-vip-transfers-page)
8. [Bespoke Tours (List + Individual Tours)](#8-bespoke-tours-list--individual-tours)
9. [Fleet Vehicles](#9-fleet-vehicles)
10. [Contact Page & Forms](#10-contact-page--forms)
11. [Simple Pages (Privacy Policy, Terms, etc.)](#11-simple-pages-privacy-policy-terms-etc)
12. [Header Logo & Navigation Menus](#12-header-logo--navigation-menus)
13. [Footer (Contact Info, WhatsApp, Viber, Copyright)](#13-footer-contact-info-whatsapp-viber-copyright)
14. [Images: Best Practices](#14-images-best-practices)
15. [SEO (Titles, Descriptions, Social Sharing)](#15-seo-titles-descriptions-social-sharing)
16. [Clearing the Cache (Very Important)](#16-clearing-the-cache-very-important)
17. [Troubleshooting](#17-troubleshooting)
18. [Glossary](#18-glossary)

---

## 1. Before You Start (Read This First)

This website was custom-designed. Most pages do **not** use the normal
"type into a big text box" approach. Instead, each designed page shows a set of
labelled **content fields** below the main editor (for example *Hero Title*,
*Hero Image*, *Philosophy*). You fill in those fields and the design stays intact.

These labelled fields are powered by a plugin called **ACF (Advanced Custom
Fields)**. You do not need to understand it — just look for the grey boxes with
field labels underneath the page editor.

---

## 2. The Golden Rule of This Site

> **On designed pages (Home, About, VIP Transfers, Bespoke Tours, Inquiry,
> Transfers), leave the big WordPress content editor EMPTY.**
> Only edit the labelled fields (the "ViaR ... Content" boxes).

**Why:** Anything typed into the main editor on those pages appears as an *extra*
block of text *below* the designed layout, which usually looks wrong.

The main editor **is** used on **Simple Pages** only (Privacy Policy, Terms,
etc.) — see [Section 11](#11-simple-pages-privacy-policy-terms-etc).

When you open a designed page, WordPress shows a blue reminder note at the top
telling you exactly which fields to use. Read it.

---

## 3. How to Log In

1. Go to **https://viartravel.com/wp-admin**
2. Enter your username and password.
3. You land on the **Dashboard**. The black menu on the left is your main
   navigation.

---

## 4. Quick Reference: Where Is Everything?

| I want to edit… | Go to… |
|---|---|
| Homepage text, images, testimonials | **Pages → Home** |
| About page | **Pages → About Us** |
| VIP Transfers page | **Pages → VIP Transfers** |
| Bespoke Tours intro/hero | **Pages → Bespoke Tours** |
| A single tour | **Bespoke Tours → (select tour)** |
| Tour Regions / Experience Types (filters) | **Bespoke Tours → Regions / Experience Types** |
| Fleet vehicles | **Fleets → (select vehicle)** |
| Contact page | **Pages → Contact** |
| Privacy Policy / Terms / plain pages | **Pages → (select or Add New)** |
| A contact/booking form's fields | **Fluent Forms → (select form)** |
| Header logo | **Appearance → Customize → Site Identity** |
| Menus (header, footer, legal) | **Appearance → Menus** |
| Footer text, phone, email, WhatsApp, Viber | **Appearance → Customize → ViaR Footer Content** |
| Homepage hero video | **Appearance → Customize → ViaR Homepage Hero** |
| SEO title & description of any page | Scroll down on the page to the **Rank Math SEO** box |
| Make changes appear live | **Clear the cache** (Section 16) |

Direct admin links:

- Pages list: https://viartravel.com/wp-admin/edit.php?post_type=page
- Bespoke Tours: https://viartravel.com/wp-admin/edit.php?post_type=viar_bespoke_tour
- Fleets: https://viartravel.com/wp-admin/edit.php?post_type=viar_fleet
- Menus: https://viartravel.com/wp-admin/nav-menus.php
- Customizer: https://viartravel.com/wp-admin/customize.php
- Fluent Forms: https://viartravel.com/wp-admin/admin.php?page=fluent_forms

---

## 5. Homepage

**Edit at:** Pages → **Home** → *Edit*
(Direct: open **Pages**, hover **Home**, click **Edit**.)

Scroll below the editor to the **"ViaR Homepage Content"** box. Fields are grouped
top to bottom:

**Hero (top banner)**
- **Hero Eyebrow** – small label above the title.
- **Hero Title** – the large headline.
- **Hero Description** – the sentence under the title.
- **Hero Image** – the full-screen background image.
- **Hero CTA Label** – button text (shown when no hero video is set).
- **Hero CTA URL** – where the button links.

**Hero video (optional):** The homepage hero shows the **Hero Image** with a
**play button** on both desktop and mobile. Clicking the play button opens a
Vimeo video in a popup. To set that video, go to
**Appearance → Customize → ViaR Homepage Hero → Hero Vimeo Video URL**
(see [Section 5.1](#51-homepage-hero-video)). If no Vimeo URL is set, the hero
shows the image plus the CTA button instead of a play button.

**"Explore Our Trips" carousel**
- **Homepage Tours Label** and **Homepage Tours Title** – the heading above the
  tour cards. The cards themselves are pulled automatically from your
  **Bespoke Tours** (see [Section 8](#8-bespoke-tours-list--individual-tours)).

**Two feature rows ("zigzag")**
- **Zigzag Row 1** – Label, Title, Description, CTA Label, CTA URL, Image.
- **Zigzag Row 2** – Label, Title, Description, CTA Label, CTA URL, Image.

**"The ViaR Standard" section**
- **Standards Label** and **Standards Title**.
- **Standards Item 1/2/3** – each has a Title and Description.

**Testimonials**
- **Testimonials Label** and **Testimonials Title**.
- **Testimonial 1** – Quote and Author.
- **Testimonial 2** – Quote and Author.

**To save:** click the blue **Update** button (top right), then
**clear the cache** (Section 16).

### 5.1 Homepage Hero Video

1. Go to **Appearance → Customize** → **ViaR Homepage Hero**.
2. Paste a Vimeo link (e.g. `https://vimeo.com/123456789`) into
   **Hero Vimeo Video URL**.
3. Click **Publish**.
4. The homepage play button now opens that video.

> The "Hero MP4 Video URL (legacy)" field is no longer used — leave it blank.

---

## 6. About Page

**Edit at:** Pages → **About Us** → *Edit*

Scroll to the **"ViaR About Page Content"** box. It is split into **tabs** across
the top — click each tab to reveal its fields:

- **Hero** – eyebrow, title, description, and hero image.
- **Philosophy** – the "Our Philosophy" section title.
- **Narrative Rows** – the alternating image/text story blocks (title, body,
  bullet points, images).
- **Secondary Intro** – the "ViaR Standard" style intro block (eyebrow, title,
  description, image).
- **Consultants** – up to 3 team members (name, role, bio, photo) plus the
  section eyebrow/title.
- **Final CTA** – the closing call-to-action (title, description, button label,
  button URL).

Fill in only the tabs you want to show. Empty sections are automatically hidden.
Click **Update**, then clear the cache.

---

## 7. VIP Transfers Page

**Edit at:** Pages → **VIP Transfers** → *Edit*

Scroll to the **"ViaR VIP Transfers Page Content"** box. It has these **tabs**:

- **Hero** – top banner (title, description, image).
- **Services Intro** – intro copy for the services section.
- **Service Cards** – the individual service blocks.
- **Fleet Listing** – heading for the vehicles list. *The vehicles themselves
  come from **Fleets*** (see [Section 9](#9-fleet-vehicles)).
- **Transfer Form** – the intro text shown above the booking form. *The form
  fields themselves are edited in Fluent Forms* (see [Section 10](#10-contact-page--forms)).
- **Stats** – the numbers/figures row.
- **Final CTA** – the closing call-to-action.

Click **Update**, then clear the cache.

---

## 8. Bespoke Tours (List + Individual Tours)

There are **two** things here: the **Bespoke Tours page** (intro/hero + the
filter bar) and the **individual tours** that fill the list.

### 8.1 The Bespoke Tours landing page

**Edit at:** Pages → **Bespoke Tours** → *Edit*
Use the **"ViaR Page Hero Content"** box:
- **Hero Eyebrow, Hero Title, Hero Description, Hero Image**
- **Hero CTA Label / URL**

The grid of tour cards below the hero is generated automatically from your
published tours. The **Region** and **Experience Type** filters are generated
from the taxonomies (see 8.3).

### 8.2 Add or edit an individual tour

**Go to:** **Bespoke Tours** in the left menu → click a tour, or **Add New**.

- **Title** (top) – the tour name.
- **Excerpt** – short summary used on the listing card. (If you don't see the
  Excerpt box, click **Screen Options** at the top and tick *Excerpt*.)
- **Featured Image / Card Image** – see the fields below.

Scroll to **"ViaR Bespoke Tour Fields"** (organised in tabs):
- **Listing** – **Tour Card Image** and card meta used in the grid.
- **Hero & Introduction** – the tour page hero and intro copy.
- **At a Glance** – key facts/summary.
- **Curated Experiences** – **Experience 1, 2, 3**, each with a title,
  description, and image.
- **Inquiry CTA** – the booking call-to-action. Leave the CTA URL empty to send
  visitors to the on-page booking form automatically.

**Assign filters (right sidebar):**
- **Regions** – tick or add a region (e.g. Attica, Peloponnese).
- **Experience Types** – tick or add a type.

Click **Publish** (or **Update**), then clear the cache.

### 8.3 Manage the filter options (Regions & Experience Types)

- **Bespoke Tours → Regions** – add/rename/delete regions.
- **Bespoke Tours → Experience Types** – add/rename/delete experience types.

Only regions/types that are used by at least one published tour appear in the
front-end filter bar.

---

## 9. Fleet Vehicles

Fleet vehicles power the vehicle cards on the **VIP Transfers** page.

**Go to:** **Fleets** in the left menu → click a vehicle, or **Add New**.

- **Title** – vehicle name (e.g. "Mercedes-Benz V-Class").
- **Excerpt** – short description for the card.
- Scroll to the **"ViaR Fleet Post Fields"** box:
  - **Fleet Card Image** – shown on the VIP Transfers listing card.
  - **Fleet Hero Image** – shown on the vehicle's own detail page.

Click **Publish** / **Update**, then clear the cache. New published vehicles
appear on the VIP Transfers page automatically.

---

## 10. Contact Page & Forms

### 10.1 Contact page text

**Edit at:** Pages → **Contact** → *Edit* and use its ViaR content fields.

### 10.2 The forms themselves (fields, labels, notification emails)

All forms are managed by the **Fluent Forms** plugin at
**Fluent Forms** in the left menu (https://viartravel.com/wp-admin/admin.php?page=fluent_forms).

| Form | Where it appears | Fluent Form |
|---|---|---|
| Contact form | Contact page | Form **ID 1** |
| VIP Transfer request | VIP Transfers page | Form **ID 3** |
| Tour booking request | Each Bespoke Tour page | Form **ID 4** |

**To edit a form's fields:** Fluent Forms → hover the form → **Edit**.
**To change where submissions are emailed:** open the form → **Settings &
Integrations → Email Notifications**.
**To read submissions:** Fluent Forms → **Entries**.

> The forms are placed on their pages automatically by the theme. You normally
> don't need to paste any shortcode — just edit the form itself in Fluent Forms.

---

## 11. Simple Pages (Privacy Policy, Terms, etc.)

For standard text pages there is a clean layout called **Simple Page**.

1. **Pages → Add New** (or open an existing page like Privacy Policy).
2. Type your **Title** at the top.
3. Write your content in the **main editor** (this is the one page type where the
   main editor *is* used — add headings, paragraphs, lists, links normally).
4. In the right sidebar, under **Page Attributes → Template**, you may select
   **Simple Page**. (The default template already uses the same clean styling,
   so this is optional.)
5. Click **Publish** / **Update**, then clear the cache.

**Set your official Privacy Policy page:** Settings → Privacy → choose the page.

---

## 12. Header Logo & Navigation Menus

### 12.1 Logo

**Appearance → Customize → Site Identity → Logo.** Upload or replace, then
**Publish**.

### 12.2 Menus

**Appearance → Menus** (https://viartravel.com/wp-admin/nav-menus.php).

Use the **"Select a menu to edit"** dropdown at the top to switch between:

| Menu | Controls |
|---|---|
| **Primary Menu** | The main header navigation |
| **Footer Menu** | The footer "Explore" links |
| **Legal Menu** | The footer legal links |
| **Client Portal Menu** | The private client portal links |

**To add a link:** tick a page on the left → **Add to Menu** → drag to reorder →
**Save Menu**.
**To remove a link:** expand the item → **Remove**.
**To confirm placement:** the **Manage Locations** tab shows which menu is
assigned to which slot.

Clear the cache after menu changes.

---

## 13. Footer (Contact Info, WhatsApp, Viber, Copyright)

**Appearance → Customize → ViaR Footer Content.** Fields:

- **Logo Subtitle** – short brand line under the footer logo (also used for SEO
  schema).
- **WhatsApp Number** – powers the WhatsApp buttons in the footer and under
  forms. Leave empty to fall back to the Concierge Phone.
- **Viber Number or Link** – a phone number (e.g. `+30 698 806 5241`) or a full
  `viber://` link.
- **Concierge Phone**
- **Concierge Email**
- **Office Address**
- **Copyright Text**
- **Footer Tagline**

Click **Publish**, then clear the cache.

> The "Design & Develop by ftiaxesite.gr" credit at the bottom-right is fixed in
> the theme and is not edited here.

---

## 14. Images: Best Practices

- **Recommended:** upload high-quality **JPG** (photos) or **PNG** (logos/graphics).
- **Hero / full-width images:** at least **1920px** wide.
- **Card / thumbnail images:** around **800–1000px** wide is plenty.
- **File size:** keep under ~400 KB where possible for fast loading. The site
  compresses images automatically, but smaller originals are always better.
- **Always add Alt Text** in the media picker (describe the image) — important
  for SEO and accessibility.
- Reuse images from the **Media Library** instead of re-uploading duplicates.

To replace an image field: click the field, choose or upload an image, then
**Update** the page.

---

## 15. SEO (Titles, Descriptions, Social Sharing)

SEO is handled by the **Rank Math SEO** plugin. On **any** page, tour, or fleet:

1. Edit the item.
2. Scroll below the content to the **Rank Math SEO** panel (or click the Rank
   Math score button near the top).
3. Click **Edit Snippet** to set:
   - **SEO Title** – what shows in Google's blue link.
   - **Description** – the grey summary text under it in Google.
   - **Permalink** – the URL slug.
4. Use the **Social** tab to set the image/title used when the page is shared on
   Facebook/LinkedIn/etc.
5. **Update**, then clear the cache.

Company-wide details (name, phone, address, logo) used in Google's rich results
are pulled automatically from your **Footer Content** settings
([Section 13](#13-footer-contact-info-whatsapp-viber-copyright)).

---

## 16. Clearing the Cache (Very Important)

The site uses caching for speed, so **your changes may not appear immediately**.
After editing, clear the cache:

1. In the top black admin bar, look for the caching plugin (**Breeze**) menu.
2. Click **Purge All Cache** (or **Purge Cache for This Page**).
3. Reload the front-end page. If you still see the old version, do a
   **hard refresh**: `Ctrl + F5` (Windows) or `Cmd + Shift + R` (Mac).

If your site is behind Cloudflare/Cloudways, an admin may also need to purge
those caches for global changes.

---

## 17. Troubleshooting

**My changes don't show up.**
Clear the cache (Section 16) and hard-refresh. Confirm you clicked
**Update/Publish**.

**I typed text but it appears as an odd block at the bottom of the page.**
You typed into the main editor on a designed page. Cut that text, paste it into
the correct **ViaR ... Content** field instead, and leave the main editor empty
(Section 2).

**A section is missing on the page.**
Its fields are probably empty. Fill in that tab/section's fields — empty sections
are hidden by design.

**A tour/vehicle isn't showing in the list.**
Make sure it's **Published** (not Draft), and for tours that it has a Region /
Experience Type assigned if you're filtering by those.

**The filter dropdown on Bespoke Tours is missing an option.**
A Region/Experience Type only appears once at least one **published** tour uses
it.

**A form isn't submitting or emails aren't arriving.**
Check the form's **Email Notifications** in Fluent Forms, and look under
**Fluent Forms → Entries** to confirm submissions are being saved.

**I can't find the Excerpt field.**
Click **Screen Options** (top-right of the edit screen) and tick **Excerpt**.

---

## 18. Glossary

- **Dashboard** – the WordPress admin home screen.
- **ACF fields** – the labelled "ViaR ... Content" boxes below the editor where
  you enter designed-page content.
- **Customizer** – **Appearance → Customize**, for logo, footer, and hero video.
- **CPT (Custom Post Type)** – special content lists: **Fleets** and
  **Bespoke Tours**.
- **Taxonomy** – categories for tours: **Regions** and **Experience Types**.
- **Hero** – the large banner section at the top of a page.
- **CTA** – "Call To Action", i.e. a button and its link.
- **Slug / Permalink** – the last part of a page's web address.
- **Cache** – a stored copy of pages for speed; must be cleared to see changes.

---

*Questions about anything not covered here? Contact your site developer at
[ftiaxesite.gr](https://ftiaxesite.gr).*
