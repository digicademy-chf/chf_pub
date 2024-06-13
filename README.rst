..  image:: https://img.shields.io/badge/PHP-8.2/8.3-blue.svg
    :alt: PHP 8.2/8.3
    :target: https://www.php.net/downloads

..  image:: https://img.shields.io/badge/TYPO3-13-orange.svg
    :alt: TYPO3 13
    :target: https://get.typo3.org/version/13

..  image:: https://img.shields.io/badge/License-GPLv3-blue.svg
    :alt: License: GPL v3
    :target: https://www.gnu.org/licenses/gpl-3.0

=======
CHF Pub
=======

The extension provides a data model for data of stereotypical publications,
such as printed volumes and academic blogs, as part of the Cultural Heritage
Framework (CHF). The central resource equals either a book series or a blog.
It may contain multiple volumes which, in turn, contain sections and/or
essays. These could be new publications or retrodigitised ones. To model a
blog instead, essays may be added directly to the resource. Other records
may be connected to volumes through a dedicated volume relation.

:Repository:  https://github.com/digicademy-chf/chf_pub
:Read online: https://digicademy-chf.github.io/chf_pub
:TER:         https://extensions.typo3.org/extension/chf_pub

Roadmap
=======

This is a pre-release version. The following steps are required for the software to move out of beta:

- Frontend plugin and templates
- Import of *Corpus Vitrearum* data
- Embedded metadata
- First set of serialisations
- Search configuration
- Generic Zotero import
- Add API documentation

**Beyond 2.0.0**

- Add testing
- Generic import
- Additional serialisations
