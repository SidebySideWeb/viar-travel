# Walkthrough — Home page

## Option A (easiest): Customizer — Hero background video

1. Go to `Appearance → Customize → ViaR Homepage Hero`.
2. **Recommended:** paste a direct MP4 link into **Hero MP4 Video URL** (from Media Library or CDN).
3. **Or** paste a Vimeo URL into **Hero Vimeo Video URL** (used only if MP4 is empty).
4. Click **Publish**.
5. Refresh the homepage.

> MP4 loads faster than Vimeo. Use a short loop (10–20s), 720p, H.264, ideally under 8 MB.

## Option B: Home page ACF fields (designed homepage layout)

1. Go to `Pages → All Pages`.
2. Edit the page named **Home**.
3. Scroll to the custom fields section **ViaR Hero Content** (below the block editor, or in the sidebar panel).
4. Find **Hero Vimeo Video (Homepage)** — directly under **Hero Image**.
5. Update the fields you need (examples):
   - Hero Title / Hero Description / Hero Image / Hero Vimeo Video (Homepage) / Hero CTA Label / Hero CTA URL
   - Tours label + title
   - Zigzag rows (labels, titles, descriptions, CTAs, images)
   - “ViaR Standard” section label/title + 3 items
   - Testimonials label/title + quotes/authors
6. Click **Update**.

> **Tip:** For the Vimeo video, use `Appearance → Customize → ViaR Homepage Hero` — it is easier to find.

### Verify

- Open the homepage in a new tab and hard refresh.

## Option C: Use the editor override (custom blocks)

If you add meaningful block content in the page editor, the site will show your blocks as the page sections.

1. Edit `Pages → Home`.
2. Add blocks in the main editor area (Heading, Image, Columns, etc.).
3. Click **Update**.

### Verify

- Refresh homepage and confirm it now matches your blocks.

## Update the “Explore our trips” carousel content

Carousel cards come from **published Bespoke Tour posts**:

1. Go to `Bespoke Tours`.
2. Edit a tour:
   - Title + Excerpt (used on the card)
   - ACF “Tour Card Image”
   - Optional: assign Region + Experience Type taxonomy terms
3. Update/Publish.

