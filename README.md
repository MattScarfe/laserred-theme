# Laser Red WordPress Theme

A modern WordPress theme built with Tailwind CSS and Vite.

## Installation

1. Clone this repository to your WordPress themes directory:
   ```bash
   cd wp-content/themes
   git clone [your-repository-url] laserred
   ```

2. Install dependencies:
   ```bash
   cd laserred
   npm install
   ```

3. Development:
   ```bash
   # Start development server
   npm run dev
   ```

4. Production:
   ```bash
   # Build for production
   npm run build
   ```

## Requirements

- Node.js 16+
- npm or yarn
- WordPress 6.0+

## Development

The theme uses Vite for development and building assets:

- `npm run dev` - Starts the development server with HMR
- `npm run build` - Builds assets for production
- `npm run preview` - Preview the production build locally

## Technologies Used

- Tailwind CSS for styling
- Vite for build tooling
- PostCSS for CSS processing