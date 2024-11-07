# My Custom WordPress Theme

This is a custom WordPress theme developed with modern tools like Vite, TailwindCSS, and Sass. It provides a streamlined workflow for theme development, including hot-reloading, asset bundling, and optimized builds for production.

---

## Table of Contents
- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Development Setup](#development-setup)
- [Build for Production](#build-for-production)
- [File Structure](#file-structure)
- [Credits](#credits)

---

## Features

- **Vite** for fast development and HMR (Hot Module Replacement)
- **TailwindCSS** for utility-first styling
- **Sass** for flexible and powerful CSS preprocessing
- **Automatic asset building** for production-ready code

## Requirements

- **Node.js** (>= 14.x)
- **npm** (usually installed with Node.js)
- **Local WordPress Environment** (e.g., [Local WP](https://localwp.com/), [MAMP](https://www.mamp.info/), etc.)

## Installation

1. **Clone the theme** into your WordPress `wp-content/themes` directory.

    ```bash
    git clone https://github.com/your-repo/my-custom-theme.git
    cd my-custom-theme
    ```

2. **Install Node.js dependencies**.

    ```bash
    npm install
    ```

## Development Setup

To start the development environment with live reloading, follow these steps:

1. **Setup dev tools**
   - run terminal trouigh the site shell in Local
   - Run this commands:
   - wp config set WP_DEBUG true --raw && wp config set WP_DISABLE_FATAL_ERROR_HANDLER true --raw && wp config set WP_DEBUG_LOG true --raw
   - wp plugin install safe-svg debug-bar query-monitor log-deprecated-notices theme-check --activate


1. **Configure Vite**:
   - In `vite.config.js`, update the `proxy` target to match your local WordPress domain (e.g., `http://test-server.local` if using Local WP).
   - This ensures Vite will proxy requests to WordPress while providing HMR for your assets.

2. **Run the Development Server**:

    ```bash
    npm run dev
    ```

   - The Vite server will start on `http://localhost:3000` and proxy your WordPress site at `http://test-server.local`.
   - Access your WordPress site (e.g., `http://test-server.local`) to see live updates as you make changes.

3. **TailwindCSS & Sass**:
   - Edit your CSS in `assets/css/styles.scss` where TailwindCSS directives and custom Sass code are included.
   - Vite watches these files for changes and applies them instantly in the browser.

## Build for Production

When ready to deploy, run the following command to bundle and optimize assets:

```bash
npm run build
