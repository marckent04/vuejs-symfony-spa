# vuejs-symfony-spa
SPA with Vuejs, vue-router, vueX, symfony api platform with auth jwt token started template

# install js packages (npm)
- npm i

# install bundles symfony
- composer update

# launch js server
- npm run watch

# launch symfony server 
- symfony serve

# Generate the SSH keys
- mkdir -p config/jwt
- openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096
- openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout
