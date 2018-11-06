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

| Username | Categories | Courses |
| -------- | ---------- | ------- |
| adam| 2017 | |
| bert| FST | |
| colin| Chemistry | |
| diane| | CHEM101 (teacher), CHEM102 (teacher), Music Society |
| emily| | CHEM102 (teacher) |
| fred| Physics | |
| gemma| | PHYS101 (teacher) |
| hannah| | PHYS101 (teacher), PHYS102 (teacher) |
| indianna| FASS | |
| james| History | |
| kenneth| | HIST100 (teacher), Music Society |
| lauren| | HIST101 (teacher) |
| mary| Politics | |
| niamh| | POLI100 (teacher), Cinema |
| oscar| | PHIL100 (teacher), Cinema |
| penny| | CHEM100, CHEM101, Music Society (teacher) |
| queenie| | HIST100, HIST101, POLI100, Hiking Club|
| rodney| | PHYS101, PHYS101, CHEM101, Music Scoiety (teacher), Cinema|
| sally| | POLI100, PHIL100, HIST100, HIST101 |
| trevor| | CHEM101, CHEM102, PHYS101, PHYS102 |
| una| | CHEM101, CHEM102, POLI100, Music Society, Cinema (teacher) |
| victor| | PHYS101, PHYS102, POLI100, Hiking Club (teacher) |
| william| | HIST100, HIST101, POLI100, PHIL100, Hiking Club |
| xanthia| | POLI100, PHIL100, HIST100, Cinema |
| yarloo| | POLI100, PHIL100, HIST100, Music Society|
| zain| Students Union | |
| james | | Chemistry + Maths |
| rachel | | Chemistry + Physics |
| jess | | Chemistry + Politics |
| john | | Physics + Maths |
| melissa | | Chemistry + Maths |
| bennie | | Chemistry + Maths + Politics |
| todd | | Maths |

## TODO

1. Add activities and their events to the generator
1. Document which users have which access
1. Add User events
1. Add Event subscriptions
1. Switch away from Lorem Ipsum
1. Add more users
1. Add more courses and categories
1. Improve documentation
