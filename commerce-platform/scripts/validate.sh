#!/usr/bin/env bash
set -euo pipefail
ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"

while IFS= read -r -d '' file; do
  php -l "$file" >/dev/null
done < <(find "$ROOT/wp-content" -type f -name '*.php' -print0)

node --check "$ROOT/wp-content/themes/iwas-commerce/assets/js/theme.js"
node --check "$ROOT/wp-content/themes/iwas-commerce/assets/js/navigation.js"
node --check "$ROOT/wp-content/themes/iwas-commerce/assets/js/pwa.js"

grep -q "Theme Name: IWAS Commerce" "$ROOT/wp-content/themes/iwas-commerce/style.css"
grep -q "Plugin Name: IWAS Commerce Core" "$ROOT/wp-content/plugins/iwas-commerce-core/iwas-commerce-core.php"
grep -q "manifest.webmanifest" "$ROOT/wp-content/plugins/iwas-commerce-core/includes/class-pwa.php"

echo "Validation passed."
