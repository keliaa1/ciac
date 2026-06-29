# CIAC Rwanda — Website

> Official website for **CIAC Rwanda** (Centre d'Innovation Agricole et Climatique), built on WordPress with a fully custom theme.

---

## Table of Contents

1. [Project Overview](#1-project-overview)
2. [Tech Stack](#2-tech-stack)
3. [Local Development Setup](#3-local-development-setup)
4. [File Structure](#4-file-structure)
5. [Required Plugins](#5-required-plugins)
6. [Theme & Pages](#6-theme--pages)
7. [Custom Post Types](#7-custom-post-types)
8. [Managing Content (WP Admin)](#8-managing-content-wp-admin)
9. [Deploying to Production](#9-deploying-to-production)
10. [Security Notes](#10-security-notes)
11. [Troubleshooting](#11-troubleshooting)

---

## 1. Project Overview

This is a WordPress-based website for CIAC Rwanda. The site uses:

- A **fully custom PHP theme** (`ciac-rwanda`) — no page builder like Divi or Elementor is needed for the front end.
- **Advanced Custom Fields (ACF)** to allow admins to edit all text, images, and content directly from the WordPress dashboard without touching code.
- **Custom Post Types** for Projects, Team Members, and Services — managed entirely from WP Admin.

---

## 2. Tech Stack

| Layer | Technology |
|-------|-----------|
| CMS | WordPress (latest) |
| Language | PHP 8.3 |
| Theme | Custom (`ciac-rwanda`) |
| Styling | Vanilla CSS (no framework) |
| Content Fields | Advanced Custom Fields (ACF) |
| Web Server | Apache (with `.htaccess`) |
| Local Dev Tool | [Local by Flywheel](https://localwp.com/) |
| Database | MySQL |

---

## 3. Local Development Setup

### Prerequisites

- Install **[Local by Flywheel](https://localwp.com/)** (free)
- No Node.js, npm, or build step required — this is a pure PHP/CSS project.

### Steps

1. **Clone or copy** this repository into your Local WP sites folder:
   ```
   C:\Users\<YourName>\Local Sites\ciac-rwanda3\app\
   ```

2. **Open Local by Flywheel** → click the `+` button → choose **"Add existing site"** and point it to that folder.

3. **Import the database:**
   - In Local, click your site → **Database** tab → **Open Adminer**
   - In Adminer: select the `local` database → click **Import** → upload the `.sql` file from the `sql/` folder

4. **Start the site** in Local and click **Open Site** — you should see the CIAC Rwanda homepage.

5. **WP Admin login:**
   - URL: `http://ciac-rwanda3.local/wp-admin`
   - Ask the project lead for admin credentials.

### Local Database Credentials (pre-configured in wp-config.php)

These work out of the box with Local by Flywheel. **Do not change them for local development:**

```
DB_NAME:     local
DB_USER:     root
DB_PASSWORD: root
DB_HOST:     localhost
```

---

## 4. File Structure

```
app/
├── public/                          <- WordPress root (deploy this folder to production)
│   ├── wp-config.php                <- DB credentials & WordPress settings
│   ├── .htaccess                    <- Apache security, HTTPS redirect, caching
│   ├── README.md                    <- This file
│   │
│   └── wp-content/
│       ├── themes/
│       │   └── ciac-rwanda/         <- The custom theme (all templates live here)
│       │       ├── functions.php        <- Theme setup, scripts, form handlers
│       │       ├── front-page.php       <- Homepage template
│       │       ├── template-about.php   <- About Us page
│       │       ├── template-projects.php<- Projects listing page
│       │       ├── template-team.php    <- Our Team page
│       │       ├── template-contact.php <- Contact Us page
│       │       ├── template-newsletter.php <- Newsletter page
│       │       ├── header.php           <- Site header / nav
│       │       ├── footer.php           <- Site footer
│       │       ├── single-project.php   <- Individual project detail page
│       │       ├── assets/css/          <- All stylesheets
│       │       │   ├── style.css            <- Main/global stylesheet
│       │       │   ├── projects.css
│       │       │   ├── team.css
│       │       │   ├── contact.css
│       │       │   ├── newsletter.css
│       │       │   └── 404.css
│       │       └── inc/
│       │           ├── cpt.php          <- Registers Custom Post Types
│       │           └── acf-fields.php   <- ACF field group definitions
│       │
│       ├── plugins/                 <- WordPress plugins
│       └── uploads/                 <- All uploaded media
│
└── sql/                             <- DB export (local setup only, NOT deployed)
    └── *.sql
```

---

## 5. Required Plugins

These plugins **must be installed and activated** for the site to work correctly.

| Plugin | Purpose | Required? |
|--------|---------|-----------|
| **Advanced Custom Fields (ACF)** | Powers all editable content fields | Critical |
| **Akismet** | Spam protection | Recommended |
| **Autoptimize** | CSS/JS minification & performance | Recommended |
| **Jetpack** | Security, stats, CDN | Optional |
| **Newsletter** | Email list management | Optional |
| **Image Optimization** | Compress uploaded images | Recommended |

### Installing a Missing Plugin

WP Admin → **Plugins** → **Add New** → search the plugin name → **Install Now** → **Activate**

> **ACF is critical.** Without it, all editable text fields fall back to hard-coded defaults and the Global Settings page will not appear.

---

## 6. Theme & Pages

The active theme must be **ciac-rwanda**:

WP Admin → **Appearance** → **Themes** → hover **ciac-rwanda** → **Activate**

### Pages (first-time setup only)

If starting from a fresh database (no import), create these pages and assign their templates:

| Page Title | Page Template |
|-----------|--------------|
| Home | *(set as static front page — see below)* |
| About Us | About Page |
| Projects | Projects Page |
| Our Team | Team Page |
| Contact Us | Contact Page |
| Newsletter | Newsletter Page |

**Set the homepage:** WP Admin → **Settings** → **Reading** → select **"A static page"** → choose **Home**.

### Navigation Menus

WP Admin → **Appearance** → **Menus** — three menus are used:

| Menu Name | Location |
|-----------|---------|
| Primary Menu | Main navigation bar |
| Explore | Footer — left column |
| Key Patterns | Footer — right column |

---

## 7. Custom Post Types

The theme registers three custom post types managed entirely from WP Admin:

### Projects
- WP Admin → **Projects** → **Add New**
- Fields: Title, Featured Image, Excerpt (short description), Body content
- Taxonomy: **Project Categories** (e.g., Reforestation, Soil Health)
- Shown on: Projects page, individual project detail pages

### Team Members
- WP Admin → **Team** → **Add New**
- Fields: Name (title), Role/bio (editor), Photo (featured image)
- Shown on: Team page and About page

### Services
- WP Admin → **Services** → **Add New**
- Fields: Title, Description, Icon/image
- Shown on: Homepage services section

---

## 8. Managing Content (WP Admin)

Almost all site content is editable through WP Admin without touching code.

### Global Settings (site-wide fields)

WP Admin → **Global Settings** controls:
- Organisation name, logo, tagline
- Footer: address, phone number, email
- Social media links (Facebook, Twitter, LinkedIn)

### Page-specific ACF Fields

Edit any page → scroll below the main editor to find ACF field groups:

| Page | What you can edit |
|------|-----------------|
| Home | Hero title/image, stats, mission section, partner logos |
| About Us | Hero, mission text, timeline, values |
| Projects | Hero, intro text |
| Our Team | Hero, intro text |
| Contact Us | Hero, form labels, map iframe, address |
| Newsletter | Hero, benefits list, background images |

### Contact Form Submissions

Submitted messages are emailed to the address in:
WP Admin → **Settings** → **General** → **Administration Email Address**

### Newsletter Subscribers

Subscriber emails are stored in the database. For production-scale management, integrate with **Mailchimp** or activate the **Newsletter** plugin.

---

## 9. Deploying to Production

### What to Deploy

Upload the entire **`public/`** folder contents to your server's web root (usually `public_html/` on cPanel).

> The `sql/` folder sits outside `public/` and will NOT be uploaded — this is intentional.

---

### Step 1 — Upload Files

Use FTP (FileZilla), your host's File Manager, or rsync to upload everything inside `public/` into `public_html/` on your server.

---

### Step 2 — Create the Production Database

- cPanel → **MySQL Databases** → create a new database
- Create a new database user with a strong password
- Grant that user **ALL PRIVILEGES** on the new database

---

### Step 3 — Import the Database

- cPanel → **phpMyAdmin** → select your new database → **Import** tab
- Upload the `.sql` file from the `sql/` folder in this repo

---

### Step 4 — Update wp-config.php

Edit these four lines with your production database details:

```php
define( 'DB_NAME',     'your_production_db_name' );
define( 'DB_USER',     'your_db_username' );
define( 'DB_PASSWORD', 'your_strong_password' );
define( 'DB_HOST',     'localhost' );
```

---

### Step 5 — Search & Replace the URLs

The imported database still contains local URLs (`ciac-rwanda3.local`).
Replace them with your live domain.

**Option A — Better Search Replace plugin (recommended):**
1. WP Admin → Plugins → install **Better Search Replace**
2. Search for: `http://ciac-rwanda3.local`
3. Replace with: `https://yourdomain.com`
4. Select all tables → run

**Option B — WP-CLI (if available on your host):**
```bash
wp search-replace 'http://ciac-rwanda3.local' 'https://yourdomain.com' --all-tables
```

---

### Step 6 — Install an SSL Certificate

Your `.htaccess` and `wp-config.php` are already configured to enforce HTTPS.
You just need to install the certificate on your host:

- cPanel → **SSL/TLS** → install a free **Let's Encrypt** certificate for your domain

---

### Step 7 — Verify

- [ ] Visit `https://yourdomain.com` — site loads over HTTPS with a padlock
- [ ] Visit `https://yourdomain.com/wp-admin` — admin login works
- [ ] Submit the contact form and confirm an email is received
- [ ] Check all pages load correctly (Home, About, Projects, Team, Contact, Newsletter)

---

## 10. Security Notes

The following hardening is already applied and does not need manual setup:

| Protection | Where |
|-----------|-------|
| HTTP → HTTPS redirect (301) | `.htaccess` |
| HSTS header (1-year) | `.htaccess` |
| Directory listing disabled | `.htaccess` |
| PHP version header hidden | `.htaccess` |
| `wp-config.php` web access blocked | `.htaccess` |
| All `.log` files web access blocked | `.htaccess` |
| All `.phar` files web access blocked | `.htaccess` |
| Backup files (`.bak`, `.sql`, `.zip`) blocked | `.htaccess` |
| PHP execution in `/uploads/` blocked | `.htaccess` |
| SQL injection query patterns blocked | `.htaccess` |
| XSS query patterns blocked | `.htaccess` |
| Author scan blocked | `.htaccess` |
| Brute-force scanner user agents blocked | `.htaccess` |
| WordPress nonces on all forms | `functions.php` |
| Input sanitization on all form fields | `functions.php` |
| Custom DB table prefix (`oJegmj1Sz_`) | `wp-config.php` |
| `WP_DEBUG` off | `wp-config.php` |
| Admin HTTPS forced (`FORCE_SSL_ADMIN`) | `wp-config.php` |
| Secure session cookies | `wp-config.php` |

### Recommended post-deploy steps

- [ ] Install **Limit Login Attempts Reloaded** plugin (free) — limits login attempts
- [ ] Change the default `admin` username to something custom
- [ ] Set up **automatic backups** (cPanel Backup Wizard or **UpdraftPlus** plugin)
- [ ] Keep WordPress core and all plugins updated regularly

---

## 11. Troubleshooting

**"Error establishing a database connection"**
→ The DB credentials in `wp-config.php` do not match what is on the server. Double-check all four `DB_*` values.

**Site loads but images or styles are broken**
→ The database still contains old local URLs. Repeat the search-replace step (Step 5).

**Admin redirects to HTTP instead of HTTPS**
→ Your SSL certificate is not yet installed on the server. Install it first (Step 6), then retry.

**ACF fields do not appear when editing pages**
→ The Advanced Custom Fields plugin is not activated. Go to WP Admin → Plugins → activate ACF.

**Contact form submits but no email arrives**
→ Most shared hosts block PHP `mail()`. Install **WP Mail SMTP** and configure it with Gmail, SendGrid, or Mailgun.

**Pages return 404 (except the homepage)**
→ WP Admin → **Settings** → **Permalinks** → click **Save Changes** to flush the rewrite rules.

**Site does not load at all after deploy**
→ Check that the `public/` folder contents were uploaded to `public_html/` (not `public_html/public/`).

---

*README maintained by the development team. Last updated: June 2026.*
