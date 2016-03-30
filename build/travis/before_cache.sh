#!/usr/bin/env bash
set -ev

if [[ ! -d ~/vendor-cache ]]; then mkdir ~/vendor-cache; fi
cachefile="$(echo -n ${TRAVIS_PHP_VERSION} | sha1sum | cut -d " " -f 1).tar"
if [[ -f ${HOME}/vendor-cache/$cachefile ]]; then echo "Delete previous cache archive"; rm -fv ${HOME}/vendor-cache/$cachefile; echo "Done"; else echo "No cache archive to delete"; fi
echo "Create cache archive"; tar -cf ${HOME}/vendor-cache/$cachefile ${TRAVIS_BUILD_DIR}/vendor/; echo "Done"
echo "Size of cache archive:"; ls -lh ${HOME}/vendor-cache/$cachefile
