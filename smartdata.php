<?php

define('CLI_SCRIPT', true);

if (isset($_SERVER['REMOTE_ADDR'])) {
    exit(1);
}

require(dirname(__FILE__) . '/config.php');
require_once($CFG->libdir . '/clilib.php');
require_once($CFG->libdir . '/adminlib.php');
require_once($CFG->dirroot . '/course/lib.php');
require_once($CFG->libdir . '/testing/generator/data_generator.php');
require_once($CFG->dirroot . '/calendar/tests/helpers.php');

$PYEAR = '000117';
$YEAR = '000118';

$DOMAIN = "example.com.au";

$users = [
    [
        'firstname' => 'Adam',
        'lastname' => 'Ant',
    ],
    [
        'firstname' => 'Bert',
        'lastname' => 'Bee',
    ],
    [
        'firstname' => 'Colin',
        'lastname' => 'Carter',
    ],
    [
        'firstname' => 'Diane',
        'lastname' => 'Denver',
    ],
    [
        'firstname' => 'Emily',
        'lastname' => 'Echo',
    ],
    [
        'firstname' => 'Fred',
        'lastname' => 'Ford',
    ],
    [
        'firstname' => 'Gemma',
        'lastname' => 'Gannoway',
    ],
    [
        'firstname' => 'Hannah',
        'lastname' => 'Henderson',
    ],
    [
        'firstname' => 'Indianna',
        'lastname' => 'Ibis',
    ],
    [
        'firstname' => 'James',
        'lastname' => 'Jackoughby',
    ],
    [
        'firstname' => 'Kenneth',
        'lastname' => 'Kamber',
    ],
    [
        'firstname' => 'Lauren',
        'lastname' => 'Little',
    ],
    [
        'firstname' => 'Mary',
        'lastname' => 'Maverley',
    ],
    [
        'firstname' => 'Niamh',
        'lastname' => 'Nimble',
    ],
    [
        'firstname' => 'Oscar',
        'lastname' => 'Ostlethwaite',
    ],
    [
        // Chemistry Undergraduate
        'firstname' => 'Penny',
        'lastname' => 'Pemberton',
    ],
    [
        'firstname' => 'Queenie',
        'lastname' => 'Quip',
    ],
    [
        'firstname' => 'Rodney',
        'lastname' => 'Rover',
    ],
    [
        'firstname' => 'Sally',
        'lastname' => 'Simpson',
    ],
    [
        // Chemistry Undergraduate
        'firstname' => 'Trevor',
        'lastname' => 'Turnbull',
    ],
    [
        // Chemistry Undergraduate
        'firstname' => 'Una',
        'lastname' => 'Umber',
    ],
    [
        'firstname' => 'Victor',
        'lastname' => 'Venenerton',
    ],
    [
        'firstname' => 'William',
        'lastname' => 'Wordsworth',
    ],
    [
        'firstname' => 'Xanthia',
        'lastname' => 'Xim',
    ],
    [
        'firstname' => 'Yarloo',
        'lastname' => 'Yawley',
    ],
    [
        'firstname' => 'Zain',
        'lastname' => 'Zacks',
    ],
    [
// 1st year Chemistry + Maths
// 2nd year Chemistry + Maths
        'firstname' => 'James',
        'lastname'  => 'Boater',
    ],
    [
// 1st year Chemistry + Physics
// 2nd year Chemistry + Physics
        'firstname' => 'Rachel',
        'lastname'  => 'Inman',
    ],
    [
// 1st year Chemistry + Politics
// 2nd year Chemistry
        'firstname' => 'Jess',
        'lastname'  => 'Middleton',
    ],
    [
// 1st year Physics + Maths
// 2nd year Physics + Maths
        'firstname' => 'John',
        'lastname'  => 'Handby',
    ],
    [
// 1st year Chemistry + Maths
// 2nd year Chemistry + Maths
        'firstname' => 'Melissa',
        'lastname'  => 'Bragshaw',
    ],
    [
// 1st year Maths + PPR
// 2nd year Maths
// 3rd year Maths
        'firstname' => 'Bennie',
        'lastname'  => 'Hill',
    ],
    [
// Maths tutor.
        'firstname' => 'Todd',
        'lastname'  => 'Richunter',
    ],
];

$categories = [
    [
        'name' => 'Students Union',
        'idnumber' => 'su',
        'enrolments' => [
            'manager' => [
                'zain',
            ],
        ],
        'events' => [
            [
                'name' => 'Fresher\'s Faire',
                'timestartmodifier' => 'P1WT8H',
                'timeduration' => HOURSECS * 8,
            ],
            [
                'name' => 'Student Safety Talks',
                'uuid' => sha1('safety1'),
                'timestartmodifier' => 'P1DT13H',
                'timeduration' => 15 * MINSECS,
            ],
            [
                'name' => 'Student Safety Talks',
                'uuid' => sha1('safety2'),
                'timestartmodifier' => 'P2DT13H',
                'timeduration' => 15 * MINSECS,
            ],
            [
                'name' => 'Student Safety Talks',
                'uuid' => sha1('safety3'),
                'timestartmodifier' => 'P3DT13H',
                'timeduration' => 15 * MINSECS,
            ],
            [
                'name' => 'Student Safety Talks',
                'uuid' => sha1('safety4'),
                'timestartmodifier' => 'P4DT13H',
                'timeduration' => 15 * MINSECS,
            ],
            [
                'name' => 'Student Safety Talks',
                'uuid' => sha1('safety5'),
                'timestartmodifier' => 'P5DT13H',
                'timeduration' => 15 * MINSECS,
            ],
            [
                'name' => 'Careers Fair',
                'timestartmodifier' => 'P10WT8H',
                'timeduration' => HOURSECS * 8,
            ],
        ],
        'children' => [
        ],
        'courses' => [
            [
                'fullname' => 'Cinema',
                'shortname' => 'Cinema',
                'idnumber' => 'su-cinema',
                'description' => '<p>Home of the student cinema</p>',
                'enrolments' => [
                    'editingteacher' => [
                        'una',
                    ],
                    'student' => [
                        'rodney',
                        'xanthia',
                        'niamh',
                        'oscar',
                    ],
                ],
                'events' => [
                    [
                        'name' => 'Monday Showing',
                        'timestartmodifier' => 'P1DT21H',
                        'timeduration' => HOURSECS * 2.5,
                        'repeats' => 10,
                    ],
                    [
                        'name' => 'Wednesday Showing',
                        'timestartmodifier' => 'P3DT21H',
                        'timeduration' => HOURSECS * 2.5,
                        'repeats' => 10,
                    ],
                    [
                        'name' => 'Friday Film',
                        'timestartmodifier' => 'P5DT21H',
                        'timeduration' => HOURSECS * 2.5,
                        'repeats' => 10,
                    ],
                    [
                        'name' => 'Saturday Matinee Film',
                        'timestartmodifier' => 'P6DT12H',
                        'timeduration' => HOURSECS * 2.5,
                        'repeats' => 10,
                    ],
                ],
            ],
            [
                'fullname' => 'Music Society',
                'shortname' => 'Music',
                'idnumber' => 'su-music',
                'description' => '<p>See the calendar for details of our practices</p>',
                'enrolments' => [
                    'editingteacher' => [
                        'penny',
                        'rodney',
                    ],
                    'student' => [
                        'sally',
                        'una',
                        'yarloo',
                        'diane',
                        'kenneth',
                    ],
                ],
                'events' => [
                    [
                        'name' => 'Big Band Rehearsal',
                        'timestartmodifier' => 'P1DT18H30M',
                        'timeduration' => HOURSECS * 2,
                        'repeats' => 10,
                    ],
                    [
                        'name' => 'Choir Rehearsal',
                        'timestartmodifier' => 'P2DT18H',
                        'timeduration' => HOURSECS * 2,
                        'repeats' => 10,
                    ],
                    [
                        'name' => 'Orchestra rehearsal',
                        'timestartmodifier' => 'P4DT19H',
                        'timeduration' => HOURSECS * 2.5,
                        'repeats' => 10,
                    ],
                    [
                        'name' => 'Mid term Concer',
                        'timestartmodifier' => 'P5WT18H30M',
                        'timeduration' => HOURSECS * 4,
                    ],
                    [
                        'name' => 'End of term Concert',
                        'timestartmodifier' => 'P10WT18H30M',
                        'timeduration' => HOURSECS * 4,
                    ],
                ],
            ],
            [
                'fullname' => 'Hiking Club',
                'shortname' => 'Hiking',
                'idnumber' => 'su-hike',
                'description' => '<p>We Hike to the pub every day ending in Y</p>',
                'enrolments' => [
                    'editingteacher' => [
                        'victor',
                    ],
                    'student' => [
                        'queenie',
                        'sally',
                        'william',
                    ],
                ],
                'events' => [
                    [
                        'name' => 'Clougha',
                        'timestartmodifier' => 'P4DT9H',
                        'timeduration' => HOURSECS * 6,
                    ],
                    [
                        'name' => 'Social',
                        'timestartmodifier' => 'P4DT19H',
                        'timeduration' => HOURSECS * 6,
                        'repeats' => 10,
                    ],
                    [
                        'name' => 'Hellvellyn',
                        'timestartmodifier' => 'P1W4DT9H',
                        'timeduration' => HOURSECS * 6,
                    ],
                    [
                        'name' => 'The Old Man',
                        'timestartmodifier' => 'P2W4DT9H',
                        'timeduration' => HOURSECS * 6,
                    ],
                ],
            ],
        ],
    ],
    [
        'name' => '2017-2018',
        'idnumber' => $PYEAR,
        'enrolments' => [
            'manager' => [
                'adam',
            ],
        ],
        'children' => [
            [
                'name' => 'Faculty of Science and Technology',
                'idnumber' => "$PYEAR-fst",
                'enrolments' => [
                    'manager' => [
                        'bert',
                    ],
                ],
                'events' => [
                     [
                         'name' => 'Faculty Induction',
                         'description' => '<p>A chance to meet the faculty staff</p>',
                         'timestartmodifier' => 'P1DT17H30M',
                     ],
                ],
                'children' => [
                    [
                        'name' => 'Chemistry',
                        'idnumber' => "{$PYEAR}-000141",
                        'enrolments' => [
                            'manager' => [
                                'colin',
                            ],
                        ],
                        'events' => [
                        ],
                        'children' => [
                        ],
                        'courses' => [
                            [
                                'fullname' => 'CHEM101: Atoms and Molecules',
                                'idnumber' => "{$PYEAR}-001667",
                                'startdate' => '09/10/2017',
                                'enddate'   => '10/11/2017',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM102: Organic Structure',
                                'idnumber' => "{$PYEAR}-001663",
                                'startdate' => '13/11/2017',
                                'enddate'   => '15/12/2017',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM103: Chemistry of the Elements',
                                'idnumber' => "{$PYEAR}-017427",
                                'startdate' => '15/01/2018',
                                'enddate' => '23/03/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM104: Organic Reactivity and Mechanism',
                                'idnumber' => "{$PYEAR}-001664",
                                'startdate' => '19/02/2018',
                                'enddate' => '01/06/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM105: Coordination Chemistry',
                                'idnumber' => "{$PYEAR}-017432",
                                'startdate' => '23/04/2018',
                                'enddate'   => '25/05/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM111: Skills for Chemists',
                                'idnumber' => "{$PYEAR}-017429",
                                'startdate' => '09/10/2017',
                                'enddate' => '19/01/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM112: Spectroscopy and Analytical Chemistry',
                                'idnumber' => "{$PYEAR}-017431",
                                'startdate' => '09/10/2017',
                                'enddate'   => '01/06/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM113: Thermodynamics of Chemical Processes',
                                'idnumber' => "{$PYEAR}-001666",
                                'startdate' => '15/01/2018',
                                'enddate'   => '16/02/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM114: Chemical Reaction Kinetics',
                                'idnumber' => "{$PYEAR}-019007",
                                'startdate' => '19/02/2018',
                                'enddate'   => '23/03/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM115: Physical Foundations of Chemistry',
                                'idnumber' => "{$PYEAR}-017430",
                                'startdate' => '13/11/2017',
                                'enddate'   => '25/05/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mathematics and Statistics',
                        'idnumber' => "{$PYEAR}-000025",
                        'enrolments' => [
                            'manager' => [
                                'colin',
                            ],
                        ],
                        'events' => [
                        ],
                        'children' => [
                        ],
                        'courses' => [
// 1st year courses 17-18
                            [
                                'fullname' => 'Math101: Calculus',
                                'idnumber' => "{$PYEAR}-001419",
                                'startdate' => '09/10/2017',
                                'enddate'   => '10/11/2017',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math102: Further Calculus',
                                'idnumber' => "{$PYEAR}-001415",
                                'startdate' => '06/11/2017',
                                'enddate'   => '15/12/2017',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math103: Probability',
                                'idnumber' => "{$PYEAR}-001418",
                                'startdate' => '06/11/2017',
                                'enddate'   => '16/02/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math104: Statistics',
                                'idnumber' => "{$PYEAR}-001417",
                                'startdate' => '06/11/2017',
                                'enddate'   => '23/03/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math105: Linear Algebra',
                                'idnumber' => "{$PYEAR}-001423",
                                'startdate' => '06/11/2017',
                                'enddate'   => '25/05/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math111: Numbers and Relations',
                                'idnumber' => "{$PYEAR}-001414",
                                'startdate' => '09/10/2017',
                                'enddate'   => '10/11/2017',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math112: Discrete Mathematics',
                                'idnumber' => "{$PYEAR}-016327",
                                'startdate' => '06/11/2017',
                                'enddate'   => '15/12/2017',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math113: Convergence and Continuity',
                                'idnumber' => "{$PYEAR}-019363",
                                'startdate' => '06/11/2017',
                                'enddate'   => '16/02/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math114: Integration and Differentiation',
                                'idnumber' => "{$PYEAR}-019364",
                                'startdate' => '06/11/2017',
                                'enddate'   => '24/03/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math115: Geometry and Calculus',
                                'idnumber' => "{$PYEAR}-005164",
                                'startdate' => '06/11/2017',
                                'enddate'   => '25/05/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    [
        'name' => '2018-2019',
        'idnumber' => $YEAR,
        'enrolments' => [
            'manager' => [
                'adam',
            ],
        ],
        'children' => [
            [
                'name' => 'Faculty of Science and Technology',
                'idnumber' => "$YEAR-fst",
                'enrolments' => [
                    'manager' => [
                        'bert',
                    ],
                ],
                'events' => [
                     [
                         'name' => 'Faculty Induction',
                         'description' => '<p>A chance to meet the faculty staff</p>',
                         'timestartmodifier' => 'P1DT17H30M',
                     ],
                ],
                'children' => [
                    [
                        'name' => 'Chemistry',
                        'idnumber' => "{$YEAR}-000141",
                        'enrolments' => [
                            'manager' => [
                                'colin',
                            ],
                        ],
                        'events' => [
                            [
                                'name' => 'Lab Safety Awareness course',
                                'uuid' => sha1('Lab 1'),
                                'description' => '<p>Every student must attent a lab safety awareneess course this week.</p><p>Attendance is compulsory and will be monitored.</p><p>You will not be allowed to use lab equipment without attending this course.</p>',
                                'timestartmodifier' => 'PT9H',
                            ],
                            [
                                'name' => 'Lab Safety Awareness course',
                                'uuid' => sha1('Lab 2'),
                                'description' => '<p>Every student must attent a lab safety awareneess course this week.</p><p>Attendance is compulsory and will be monitored.</p><p>You will not be allowed to use lab equipment without attending this course.</p>',
                                'timestartmodifier' => 'PT14H',
                            ],
                            [
                                'name' => 'Lab Safety Awareness course',
                                'uuid' => sha1('Lab 3'),
                                'description' => '<p>Every student must attent a lab safety awareneess course this week.</p><p>Attendance is compulsory and will be monitored.</p><p>You will not be allowed to use lab equipment without attending this course.</p>',
                                'timestartmodifier' => 'P1DT9H',
                            ],
                            [
                                'name' => 'Lab Safety Awareness course',
                                'uuid' => sha1('Lab 4'),
                                'description' => '<p>Every student must attent a lab safety awareneess course this week.</p><p>Attendance is compulsory and will be monitored.</p><p>You will not be allowed to use lab equipment without attending this course.</p>',
                                'timestartmodifier' => 'P1DT14H',
                            ],
                            [
                                'name' => 'Lab Safety Awareness course',
                                'uuid' => sha1('Lab 5'),
                                'description' => '<p>Every student must attent a lab safety awareneess course this week.</p><p>Attendance is compulsory and will be monitored.</p><p>You will not be allowed to use lab equipment without attending this course.</p>',
                                'timestartmodifier' => 'P3DT9H',
                            ],
                            [
                                'name' => 'Lab Safety Awareness course',
                                'uuid' => sha1('Lab 6'),
                                'description' => '<p>Every student must attent a lab safety awareneess course this week.</p><p>Attendance is compulsory and will be monitored.</p><p>You will not be allowed to use lab equipment without attending this course.</p>',
                                'timestartmodifier' => 'P3DT14H',
                            ],
                        ],
                        'children' => [
                        ],
                        'courses' => [
                            [
                                'fullname' => 'CHEM101: Atoms and Molecules',
                                'shortname' => 'CHEM101',
                                'idnumber' => "{$YEAR}-001667",
                                'startdate' => '08/10/2018',
                                'enddate' => '09/11/2018',
                                'description' => '<p>Atoms and Molecules</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                    ],
                                    'student' => [
                                        'penny',
                                        'rodney',
                                        'trevor',
                                        'una',
                                    ],
                                ],
                                'events' => [
                                    [
                                        'name' => 'Workbook handout',
                                        'description' => '<p>Weekly workbooks will be handed out</p>',
                                        'timestartmodifier' => 'P1DT9H',
                                    ],
                                    [
                                        'name' => 'Workbook collection',
                                        'description' => '<p>Weekly workbooks will be collected</p>',
                                        'timestartmodifier' => 'P10W1DT9H',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'CHEM102: Organic Structure',
                                'idnumber' => "{$YEAR}-001663",
                                'startdate' => '12/11/2018',
                                'enddate' => '14/12/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'penny',
                                        'trevor',
                                        'una',
                                    ],
                                ],
                                'events' => [
                                    [
                                        'name' => 'Organic roadshow',
                                        'description' => '<p>Roadshow about organics</p>',
                                        'timestartmodifier' => 'P1W1DT9H',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'CHEM103: Chemistry of the Elements',
                                'idnumber' => "{$YEAR}-017427",
                                'startdate' => '14/01/2019',
                                'enddate' => '22/03/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'penny',
                                        'trevor',
                                        'una',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM104: Organic Reactivity and Mechanism',
                                'idnumber' => "{$YEAR}-001664",
                                'startdate' => '18/02/2019',
                                'enddate' => '31/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'penny',
                                        'trevor',
                                        'una',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM105: Coordination Chemistry',
                                'idnumber' => "{$YEAR}-017432",
                                'startdate' => '25/03/2019',
                                'enddate' => '24/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'penny',
                                        'trevor',
                                        'una',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM111: Skills for Chemists',
                                'idnumber' => "{$YEAR}-017429",
                                'startdate' => '08/10/2018',
                                'enddate' => '18/01/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'penny',
                                        'trevor',
                                        'una',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM112: Spectroscopy and Analytical Chemistry',
                                'idnumber' => "{$YEAR}-017431",
                                'startdate' => '08/10/2018',
                                'enddate'   => '31/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'penny',
                                        'trevor',
                                        'una',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM113: Thermodynamics of Chemical Processes',
                                'idnumber' => "{$YEAR}-001666",
                                'startdate' => '14/01/2019',
                                'enddate'   => '15/02/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'penny',
                                        'trevor',
                                        'una',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM114: Chemical Reaction Kinetics',
                                'idnumber' => "{$YEAR}-019007",
                                'startdate' => '18/02/2019',
                                'enddate'   => '22/03/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'penny',
                                        'trevor',
                                        'una',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM115: Physical Foundations of Chemistry',
                                'idnumber' => "{$YEAR}-017430",
                                'startdate' => '12/11/2018',
                                'enddate'   => '24/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'penny',
                                        'trevor',
                                        'una',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],

// Second year Chemsitry courses
                            [
                                'fullname' => 'CHEM201: Alkene and Aromatic Chemistry',
                                'shortname' => 'CHEM201',
                                'idnumber' => "{$YEAR}-017877",
                                'startdate' => '08/10/2018',
                                'enddate'   => '24/05/2019',
                                'description' => '<p>Alkene and Aromatic Chemistry</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM203: Strategies for Chemical Synthesis',
                                'idnumber' => "{$YEAR}-017878",
                                'startdate' => '14/01/2019',
                                'enddate'   => '07/06/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM204: Molecular Structure Determination',
                                'shortname' => 'CHEM204',
                                'idnumber' => "{$YEAR}-017879",
                                'startdate' => '12/11/2018',
                                'enddate'   => '03/05/2019',
                                'description' => '<p>Molecular Structure Determination</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                    ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM211: The Physical Principles of Spectroscopy',
                                'shortname' => 'CHEM211',
                                'idnumber' => "{$YEAR}-017880",
                                'startdate' => '14/01/2019',
                                'enddate'   => '22/03/2019',
                                'description' => '<p>The Physical Principles of Spectroscopy</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                     ],
                                ],
                                'events' => [
                                ],
                            ],

                            [
                                'fullname' => 'CHEM212: Thermodynamics and Statistical Mechanics',
                                'shortname' => 'CHEM212',
                                'idnumber' => "{$YEAR}-017974",
                                'startdate' => '08/10/2018',
                                'enddate'   => '03/05/2019',
                                'description' => '<p>Thermodynamics and Statistical Mechanics</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                     ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM218: Electrochemistry',
                                'idnumber' => "{$YEAR}-019375",
                                'startdate' => '11/02/2019',
                                'enddate'   => '03/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                     ],
                                ],
                                'events' => [
                                ],
                            ],


                            [
                                'fullname' => 'CHEM222: Organometallics, Catalysis and Mechanism',
                                'shortname' => 'CHEM222',
                                'idnumber' => "{$YEAR}-017974",
                                'startdate' => '12/11/2018',
                                'enddate'   => '14/12/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                     ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM224: Inorganic Chemistry',
                                'shortname' => 'CHEM224',
                                'idnumber' => "{$YEAR}-017883",
                                'startdate' => '18/02/2019',
                                'enddate'   => '22/03/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                     ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM233: Solids, Soft Matter and Surface',
                                'shortname' => 'CHEM233',
                                'idnumber' => "{$YEAR}-017884",
                                'startdate' => '14/01/2019',
                                'enddate'   => '10/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                     ],
                                ],
                                'events' => [
                                ],
                            ],
                            [
                                'fullname' => 'CHEM241: Quantum Chemistry, Symmetry and Group Theory',
                                'shortname' => 'CHEM241',
                                'idnumber' => "{$YEAR}-17883",
                                'startdate' => '08/10/2018',
                                'enddate'   => '14/12/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'diane',
                                        'emily',
                                    ],
                                    'student' => [
                                        'james',
                                        'rachel',
                                        'jess',
                                        'melissa',
                                     ],
                                ],
                                'events' => [
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mathematics and Statistics',
                        'idnumber' => "{$YEAR}-000025",
                        'enrolments' => [
                            'manager' => [
                                'colin',
                            ],
                        ],
                        'events' => [
                        ],
                        'children' => [
                        ],
                        'courses' => [
                            [
                                'fullname' => 'Math101: Calculus',
                                'idnumber' => "{$YEAR}-001419",
                                'startdate' => '08/10/2018',
                                'enddate'   => '09/11/2018',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'penny',
                                    ],
                                ],
                            ],


// 2nd year courses 18-19
                            [
                                'fullname' => 'Math210: Real Analysis',
                                'shortname' => 'MATH210',
                                'idnumber' => "{$YEAR}-001436",
                                'startdate' => '08/10/2018',
                                'enddate'   => '24/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math215: Complex Analysis',
                                'shortname' => 'MATH215',
                                'idnumber' => "{$YEAR}-004869",
                                'startdate' => '08/10/2018',
                                'enddate'   => '03/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math220: Linear Algebra II',
                                'shortname' => 'MATH220',
                                'idnumber' => "{$YEAR}-001441",
                                'startdate' => '08/10/2018',
                                'enddate'   => '03/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math225: Abstract Algebra',
                                'shortname' => 'MATH225',
                                'idnumber' => "{$YEAR}-001443",
                                'startdate' => '08/10/2018',
                                'enddate'   => '03/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math230: Probability II',
                                'shortname' => 'MATH230',
                                'idnumber' => "{$YEAR}-001447",
                                'startdate' => '08/10/2018',
                                'enddate'   => '03/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math235: Statistics II',
                                'shortname' => 'MATH235',
                                'idnumber' => "{$YEAR}-001447",
                                'startdate' => '08/10/2018',
                                'enddate'   => '24/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math240: Project Skills',
                                'shortname' => 'MATH240',
                                'idnumber' => "{$YEAR}-019779",
                                'startdate' => '08/10/2018',
                                'enddate'   => '15/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math245: Computational Mathematics',
                                'idnumber' => "{$YEAR}-019780",
                                'startdate' => '08/10/2018',
                                'enddate'   => '03/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'james',
                                        'john',
                                        'melissa',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math271: Minor Course in Mathematics',
                                'idnumber' => "{$YEAR}-015186",
                                'startdate' => '08/10/2018',
                                'enddate'   => '03/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [

                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math272: Minor Course in Mathematics',
                                'idnumber' => "{$YEAR}-015374",
                                'startdate' => '14/01/2019',
                                'enddate'   => '03/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [

                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math313: Probability Theory',
                                'idnumber' => "{$YEAR}-001459",
                                'startdate' => '12/11/2018',
                                'enddate'   => '29/03/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'bennie',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'Math314: Lebesgue Integration',
                                'idnumber' => "{$YEAR}-019780",
                                'startdate' => '08/10/2018',
                                'enddate'   => '24/05/2019',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'todd',
                                    ],
                                    'student' => [
                                        'bennie',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Phsyics',
                        'idnumber' => "{$YEAR}-000035",
                        'enrolments' => [
                            'manager' => [
                                'fred',
                            ],
                        ],
                        'children' => [
                        ],
                        'courses' => [
                            [
                                'fullname' => 'PHYS101: The Physical Universe',
                                'shortname' => 'PHYS101',
                                'idnumber' => "{$YEAR}-001701",
                                'description' => '<p>The Physical Univerise</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'gemma',
                                        'hannah',
                                    ],
                                    'student' => [
                                        'rodney',
                                        'trevor',
                                        'victor',
                                    ],
                                ],
                                'events' => [
                                    [
                                        'name' => 'Science week volunteering',
                                        'description' => '<p>We will have guests from local schools in to the observatory.</p>',
                                        'timestartmodifier' => 'P1W1DT21H',
                                    ]
                                ],
                            ],
                            [
                                'fullname' => 'PHYS102: Classical Mechanics',
                                'shortname' => 'PHYS102',
                                'idnumber' => "{$YEAR}-001702",
                                'description' => '<p>Classical Mechanics</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'hannah',
                                    ],
                                    'student' => [
                                        'rodney',
                                        'trevor',
                                        'victor',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Faculty of Arts and Social Sciences',
                'idnumber' => "{$YEAR}-fass",
                'enrolments' => [
                    'manager' => [
                        'indianna',
                    ],
                ],
                'children' => [
                    [
                        'name' => 'History',
                        'idnumber' => "{$YEAR}-000021",
                        'enrolments' => [
                            'manager' => [
                                'james',
                            ],
                        ],
                        'children' => [
                        ],
                        'courses' => [
                            [
                                'fullname' => 'HIST100: From Ancient to Modern: History and Historians',
                                'shortname' => 'HIST100',
                                'idnumber' => "{$YEAR}-015173",
                                'description' => '<p>From Ancient to Modern: History and Historians</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'kenneth',
                                    ],
                                    'student' => [
                                        'queenie',
                                        'sally',
                                        'william',
                                        'xanthia',
                                        'yarloo',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'HIST101: The Fall of Rome',
                                'shortname' => 'HIST101',
                                'idnumber' => "{$YEAR}-018723",
                                'description' => '<p>The Fall of Rome</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'lauren',
                                    ],
                                    'student' => [
                                        'queenie',
                                        'sally',
                                        'william',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'name' => 'Politics, Philosophy and Religion',
                        'idnumber' => "{$YEAR}-000243",
                        'enrolments' => [
                            'manager' => [
                                'mary',
                            ],
                        ],
                        'events' => [
                            [
                                'name' => 'PPR Welcome from the Dean',
                                'timestartmodifier' => 'P3DT15H',
                                'timeduration' => MINSECS * 15,
                            ],
                        ],
                        'children' => [
                        ],
                        'courses' => [
                            [
                                'fullname' => 'POLI100: Politics and International Relations in the Contemporary World',
                                'shortname' => 'POLI100',
                                'idnumber' => "{$YEAR}-008549",
                                'description' => '<p>Politics and International Relations in the Contemporary World</p>',
                                'events' => [
                                    [
                                        'name' => 'POLI100 Lecture Series',
                                        'timestartmodifier' => 'P4DT12H',
                                        'timeduration' => HOURSECS,
                                        'repeats' => 8,
                                    ],
                                    [
                                        'name' => 'POLI100 Exam',
                                        'timestartmodifier' => 'P9W4DT11H',
                                        'timeduration' => 2 * HOURSECS,
                                    ],
                                ],
                                'enrolments' => [
                                    'editingteacher' => [
                                        'niamh',
                                    ],
                                    'student' => [
                                        'penny',
                                        'queenie',
                                        'sally',
                                        'william',
                                        'xanthia',
                                        'yarloo',
                                        'una',
                                    ],
                                ],
                            ],
                            [
                                'fullname' => 'PHIL100: Introduction to Philosophy',
                                'shortname' => 'PHIL100',
                                'idnumber' => "{$YEAR}-002163",
                                'description' => '<p>Introduction to Philosophy</p>',
                                'enrolments' => [
                                    'editingteacher' => [
                                        'oscar',
                                    ],
                                    'student' => [
                                        'penny',
                                        'queenie',
                                        'sally',
                                        'william',
                                        'xanthia',
                                        'yarloo',
                                        'victor',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];

$transaction = $DB->start_delegated_transaction();

$generator = new test_data_generator();

$generator->create_users($users);
$generator->setup_courses($categories);

$transaction->allow_commit();

class test_data_generator {

    public $users = [];
    public $courses = [];
    public $categories = [];
    public $roles = [];
    protected $adminuser = null;

    public function __construct() {
        global $DB;

        $this->roles = $DB->get_records('role', [], '', 'shortname, id');
        $this->adminuser = \core_user::get_user_by_username('admin');

        $users = $DB->get_recordset('user');
        foreach ($users as $user) {
            if (!empty($user->idnumber)) {
                $this->users[$user->username] = $user;
            }
        }
        $users->close();

        $courses = $DB->get_recordset('course');
        foreach ($courses as $course) {
            if (!empty($course->idnumber)) {
                $this->courses[$course->idnumber] = $course;
            }
        }
        $courses->close();

        $categories = $DB->get_recordset('course_categories');
        foreach ($categories as $coursecat) {
            if (!empty($coursecat->idnumber)) {
                $this->categories[$coursecat->idnumber] = $coursecat;
            }
        }
        $categories->close();
    }

    public function create_users($users) {
        foreach ($users as $user) {
            $this->create_user($user);
        }
    }

    public function setup_courses($data) {
        foreach ($data as $category) {
            $this->create_category($category);
        }
    }

    protected function create_category($category, $parent = null) {
        global $DB;
        // Process the current category.
        $record = (object) $category;

        if (!empty($parent)) {
            $record->parent = $parent->id;
        }

        if (!empty($this->categories[$record->idnumber])) {
            $thiscategory = $this->categories[$record->idnumber];
            error_log("==> Found existing category");
            $changed = false;
            foreach ((array) $record as $key => $value) {
                if (isset($thiscategory->$key) && $thiscategory->$key != $value) {
                    $thiscategory->$key = $value;
                    $changed = true;
                }
            }
            if ($changed) {
                $DB->update_record('course_categories', $thiscategory);
            }

            // TODO Update the parentage.
        } else {
            $generator = new testing_data_generator();
            $thiscategory = $generator->create_category($record);
            if ($parent) {
                error_log("==> Created category '{$thiscategory->name}' in '{$parent->name}'");
            } else {
                error_log("==> Created category '{$thiscategory->name}' in root");
            }
        }

        $this->categories[$thiscategory->idnumber] = $thiscategory;

        // Now add any child categories.
        foreach ($category['children'] as $child) {
            $this->create_category($child, $thiscategory);
        }

        // Now add any courses directly in this category.
        if (isset($category['courses'])) {
            foreach ($category['courses'] as $course) {
                $this->create_course($course, $thiscategory);
            }
        }

        // Now add any events directly in this category.
        if (isset($category['events'])) {
            foreach ($category['events'] as $event) {
                $event['category'] = $thiscategory;
                $this->create_event($event);
            }
        }

        // Finally enrol any users who should be there.
        if (isset($category['enrolments'])) {
            foreach ($category['enrolments'] as $rolename => $users) {
                foreach ($users as $username) {
                    $this->assign_category_role($thiscategory, $username, $rolename);
                }
            }
        }

        return $thiscategory;
    }

    protected function create_course($course, $category) {
        global $DB;
        $record = (object) $course;

        $record->category = $category->id;

        if (!empty($record->startdate)) {
            $value = DateTime::createFromFormat('d/m/Y', $record->startdate);
            $record->startdate = $value->format('U');

            if (!empty($record->enddate)) {
                $value = DateTime::createFromFormat('d/m/Y', $record->enddate);
                $record->enddate = $value->format('U');
            }
        }

        if (empty($record->startdate)) {
            unset($record->enddate);
        }

        if (empty($record->description)) {
            $exp = explode(":", $record->fullname, 2);
            $record->description = "<p>" . trim($exp[1]) . "</p>";
        }

        if (empty($record->shortname)) {
            $name = explode(":", $record->fullname, 2);
            $record->shortname = trim($name[0]);
        }

        $year = explode('-', $record->idnumber);
        $record->shortname = "{$year[0]}-{$record->shortname}";

        if (!empty($this->courses[$record->idnumber])) {
            $thiscourse = $this->courses[$record->idnumber];
            error_log("==> Found existing course {$record->shortname}");
            $changed = false;
            foreach ((array) $record as $key => $value) {
                if (isset($thiscourse->$key) && $thiscourse->$key != $value) {
                    $thiscourse->$key = $value;
                    $changed = true;
                    error_log("{$key} > {$thiscourse->$key} => {$value}");
                }
            }
            if ($changed) {
                $DB->update_record('course', $thiscourse);
            }

            // TODO Update the parentage.
        } else {
            error_log("==> Creating course '{$record->shortname}' in '{$category->name}'");
            $generator = new testing_data_generator();
            $thiscourse = $generator->create_course($record);
            $this->courses[$thiscourse->idnumber] = $thiscourse;
            error_log("==> Created course '{$thiscourse->shortname}' in '{$category->name}'");
        }

        // Finally enrol any users who should be there.
        if (isset($course['enrolments'])) {
            foreach ($course['enrolments'] as $rolename => $users) {
                foreach ($users as $username) {
                    $this->assign_course_role($thiscourse, $username, $rolename);
                }
            }
        }

        // Now add any events directly in this category.
        if (isset($course['events'])) {
            foreach ($course['events'] as $event) {
                $event['course'] = $thiscourse;
                if (!empty($record->startdate) && empty($event['timestart']) && !empty($event['timestartmodifier'])) {
                    $event['timestart'] = $record->startdate;
                }
                $this->create_event($event);
            }
        }

        return $thiscourse;
    }

    protected function create_user($user) {
        global $DOMAIN, $DB;

        $record = (object) $user;
        $username = strtolower($record->firstname);
        $record->username  = $username;
        $record->idnumber = $record->username;
        $record->email = "{$username}@{$DOMAIN}";;
        $record->password = 'x';

        if (isset($this->users[$record->username])) {
            $thisuser = $this->users[$record->idnumber];
            error_log("==> Found existing user {$record->username}");
            $changed = false;
            foreach ((array) $record as $key => $value) {
                if ($key === 'password') {
                    if (validate_internal_user_password($thisuser, $value)) {
                        continue;
                    }
                    $value = hash_internal_user_password($value);
                }

                if (isset($thisuser->$key) && $thisuser->$key != $value) {
                    error_log("{$key} > {$thisuser->$key} => {$value}");
                    $thisuser->$key = $value;
                    $changed = true;
                }
            }
            if ($changed) {
                error_log("Updating user {$thisuser->username}");
                $DB->update_record('user', $thisuser);
            }
        } else {
            $generator = new testing_data_generator();

            $thisuser = $generator->create_user($record);
            $this->users[$username] = $thisuser;

            $thisuser = $this->users[$username];
        }

        // Now add any events directly in this category.
        if (isset($user['events'])) {
            foreach ($user['events'] as $event) {
                $event['user'] = $thisuser;
                $this->create_event($event);
            }
        }
    }

    protected function assign_category_role($category, string $username, string $rolename) {
        $generator = new testing_data_generator();

        $roleid = $this->roles[$rolename]->id;
        $user = $this->users[$username];
        $userid = $user->id;
        $context = \context_coursecat::instance($category->id);
        $contextid = $context->id;

        $generator->role_assign($roleid, $userid, $contextid);
        error_log("==> Assigned role '{$rolename}' ({$roleid}) to '{$user->username}' in '{$category->name}'");
    }

    protected function assign_course_role($course, string $username, string $rolename) {
        $generator = new testing_data_generator();

        $roleid = $this->roles[$rolename]->id;
        $user = $this->users[$username];
        $userid = $user->id;

        $generator->enrol_user($userid, $course->id, $roleid);
        error_log("==> Enrolled user '{$user->username}' as a '{$rolename}' ({$roleid}) in '{$course->shortname}'");

    }

    protected function create_event($event) {
        global $DB;

        $properties = [
            'name' => 'Event',
            'description' => '',
            'descriptionformat' => FORMAT_HTML,
            'eventtype' => 'site',
            'repeat' => 0,
            'repeats' => 0,
            'timestart' => null,
            'timeduration' => 0,
            'timesort' => null,
            'type'  => CALENDAR_EVENT_TYPE_STANDARD,
            'uuid' => null,
        ];

        $event = (object) $event;

        $record = (object) [];
        foreach ($properties as $property => $default) {
            if (isset($event->$property)) {
                $record->$property = $event->$property;
            } else {
                $record->$property = $default;
            }
        }
        $params = [];

        if (!empty($record->timestart)) {
            $time = \DateTime::createFromFormat('U', $record->timestart);
        } else {
            $time = new \DateTime('Sunday');
            $time->sub(new \DateInterval('P3W'));
        }

        if (isset($event->timestartmodifier)) {
            $time->add(new \DateInterval($event->timestartmodifier));
        }
        $record->timestart = $time->format('U');

        if (isset($event->category)) {
            $record->eventtype = 'category';
            $params['categoryid'] = $record->categoryid = $event->category->id;
        }

        if (isset($event->course)) {
            $record->eventtype = 'course';
            $params['courseid'] = $record->courseid = $event->course->id;
        }

        if (isset($event->username)) {
            $record->eventtype = 'user';
            $user = $this->users[$username];
            $params['userid'] = $record->userid = $user->id;
        }

        if (empty($record->userid)) {
            $record->userid = $this->adminuser->id;;
        }

        if (!empty($record->repeats)) {
            $record->repeat = 1;
        }

        if (empty($record->uuid)) {
            $record->uuid = sha1($record->name);
        }

        $params['eventtype'] = $record->eventtype;
        $params['uuid'] = $record->uuid;

        $oldevents = $DB->get_records('event', $params);
        $oldevent = null;
        foreach ($oldevents as $e) {
            $oldevent = $e;
            if (!empty($e->repeatid) && $e->repeatid = $e->id) {
                break;
            }
        }


        if ($oldevent) {
            $e = new \calendar_event($oldevent);
            $e->update($record, false);
            error_log("Event: {$record->name} updated");
        } else {
            \calendar_event::create($record, false);
            error_log("Event: {$record->name} created");
        }
    }
}
