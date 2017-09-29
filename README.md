# moodle-datagenerator

This is a data generator which attempts to set up pseudo-realistic data.

The created dataset includes:
* users
* course categories
* courses
* and events

## Instructions

Copy the `smartdata.php` file to the root of your Moodle checkout and run it from the CLI.

This can be run multiple times to update the existing dataset.

## Notes

All users are created with the password `x`.

## TODO

1. Add activities and their events to the generator
1. Document which users have which access
1. Add User events
1. Add Event subscriptions
1. Switch away from Lorem Ipsum
1. Add more users
1. Add more courses and categories
1. Improve documentation
