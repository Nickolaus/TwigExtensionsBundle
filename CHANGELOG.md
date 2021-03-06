# Changelog

## 2.1.1 (2015-12-29)

- added support for PHP 7.0 and HHVM

## 2.1.0 (2015-12-01)

- added forward compatibility for Twig 2.0
- added conditional code updates to avoid deprecation notices with Symfony 2.8
- added support for Symfony 3.*
- dropped support for Symfony 2.0, 2.1, 2.2

## 2.0.1 (2014-06-01)

- updated version constraint for installation instructions

## 2.0.0 (2014-06-01)

- BC break (follow `UPGRADE-2.0.md` to upgrade):
  - [#10]: dropped support for passing a `FormView` instance to the `craue_cloneForm` function

[#10]: https://github.com/craue/TwigExtensionsBundle/issues/10

## 1.0.2 (2013-12-03)

- added filter `craue_removeKey`

## 1.0.1 (2013-09-25)

- adjusted the Composer requirements to also allow Symfony 2.3 and up (now 2.0 and up)
- fixed test config

## 1.0.0 (2013-02-28)

- first stable release

## 2011-05-20

- initial commit
