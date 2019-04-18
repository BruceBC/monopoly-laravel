<?php

return [
  'original' => [
    [
      'rule' => "Doctor's fees. Pay $50.",
      'action' => 'pay',
      'type' => 'community',
      'tag' => 'o-doctors-fee',
    ],
    [
      'rule' => 'Holiday fund matures. Receive $100.',
      'action' => 'collect',
      'type' => 'community',
      'tag' => 'o-holiday-fund',
    ],
    [
      'rule' => 'Life insurance matures. Collect $100.',
      'action' => 'collect',
      'type' => 'community',
      'tag' => 'o-life-insurance',
    ],
    [
      'rule' => 'School fees. Pay $50.',
      'action' => 'pay',
      'type' => 'community',
      'tag' => 'o-school-fees',
    ],
    [
      'rule' => 'Income tax refund. Collect $20.',
      'action' => 'collect',
      'type' => 'community',
      'tag' => 'o-income-tax',
    ],
    [
      'rule' =>
        'Get out of jail free. This card may be kept until needed or traded.',
      'action' => 'bail',
      'type' => 'community',
      'tag' => 'o-jail-free-community',
    ],
    [
      'rule' => 'Bank error in your favor. Collect $200.',
      'action' => 'collect',
      'type' => 'community',
      'tag' => 'o-bank-error',
    ],
    [
      'rule' => 'Advance to go. (Collect $200)',
      'action' => 'advance_go',
      'type' => 'community',
      'tag' => 'o-advance-go-community',
    ],
    [
      'rule' =>
        'You are assessed for street repairs. Pay $40 per house and $150 per hotel you own.',
      'action' => 'repair',
      'type' => 'community',
      'tag' => 'o-street-repairs-community',
    ],
    [
      'rule' => 'You have won second prize in a beauty contest. Collect $10.',
      'action' => 'collect',
      'type' => 'community',
      'tag' => 'o-beauty-contest',
    ],
    [
      'rule' => 'From sale of stock you get $50.',
      'action' => 'collect',
      'type' => 'community',
      'tag' => 'o-stock-sale',
    ],
    [
      'rule' => 'You inherit $100.',
      'action' => 'collect',
      'type' => 'community',
      'tag' => 'o-inherit',
    ],
    [
      'rule' => 'It is your birthday. Collect $10 from every player.',
      'action' => 'collect_per_player',
      'type' => 'community',
      'tag' => 'o-birthday',
    ],
    [
      'rule' => 'Received $25 consultancy fee.',
      'action' => 'collect',
      'type' => 'community',
      'tag' => 'o-consultancy-fee',
    ],
    [
      'rule' =>
        'Go to jail. Go directly to jail, do not pass go, do not collect $200.',
      'action' => 'jail',
      'type' => 'community',
      'tag' => 'o-go-to-jail-community',
    ],
    [
      'rule' => 'Hospital fees. Pay $100.',
      'action' => 'pay',
      'type' => 'community',
      'tag' => 'o-hospital-fees',
    ],
    [
      'rule' => 'Advance to boardwalk.',
      'action' => 'advance_street',
      'type' => 'chance',
      'tag' => 'o-advance-boardwalk',
    ],
    [
      'rule' =>
        'Take a trip to reading railroad. If you pass go, collect $200.',
      'action' => 'advance_street',
      'type' => 'chance',
      'tag' => 'o-reading-trip',
    ],
    [
      'rule' => 'Your building loan matures. Collect $150.',
      'action' => 'collect',
      'type' => 'chance',
      'tag' => 'o-loan-matures',
    ],
    [
      'rule' => 'Advance to Illinois Avenue. If you pass go, collect $200.',
      'action' => 'advance_street',
      'type' => 'chance',
      'tag' => 'o-advance-illinois',
    ],
    [
      'rule' =>
        'Advance to the nearest utility. If unowned, you may buy it from the bank. If owned, throw dice and pay owner 10 times the amount thrown.',
      'action' => 'advance_utility',
      'type' => 'chance',
      'tag' => 'o-nearest-utility',
    ],
    [
      'rule' =>
        'Go to jail. Go directly to jail, do not pass go, do not collect $200.',
      'action' => 'jail',
      'type' => 'chance',
      'tag' => 'o-go-to-jail-chance',
    ],
    [
      'rule' => 'Advance to go. (Collect $200)',
      'action' => 'advance_go',
      'type' => 'chance',
      'tag' => 'o-advance-go-chance',
    ],
    [
      'rule' => 'Bank pays you dividend of $50.',
      'action' => 'collect',
      'type' => 'chance',
      'tag' => 'o-bank-dividend',
    ],
    [
      'rule' =>
        'Make general repairs on all your property: For each house pay $25, for each hotel pay $100.',
      'action' => 'repair',
      'type' => 'chance',
      'tag' => 'o-general-repairs-chance',
    ],
    [
      'rule' =>
        'Advance to the nearest railroad. If unowned, you may buy it from the bank. If owned, pay owner twice the rental to which they are otherwise entitled.',
      'action' => 'advance_railroad',
      'type' => 'chance',
      'tag' => 'o-advance-railroad-1',
    ],
    [
      'rule' =>
        'Advance to the nearest railroad. If unowned, you may buy it from the bank. If owned, pay owner twice the rental to which they are otherwise entitled.',
      'action' => 'advance_railroad',
      'type' => 'chance',
      'tag' => 'o-advance-railroad-2',
    ],
    [
      'rule' => 'Speeding fine $15.',
      'action' => 'pay',
      'type' => 'chance',
      'tag' => 'o-speeding-fine',
    ],
    [
      'rule' => 'Go back three spaces.',
      'action' => 'retreat',
      'type' => 'chance',
      'tag' => 'o-back-three-spaces',
    ],
    [
      'rule' =>
        'You have been elected chairman of the board. Pay each player $50.',
      'action' => 'pay_per_player',
      'type' => 'chance',
      'tag' => 'o-elected-chairman',
    ],
    [
      'rule' => 'Advance to St. Charles Place. If you pass go, collect $200.',
      'action' => 'advance_street',
      'type' => 'chance',
      'tag' => 'o-advance-st-charles-place',
    ],
    [
      'rule' =>
        'Get out of jail free. This card may be kept until needed or traded.',
      'action' => 'bail',
      'type' => 'chance',
      'tag' => 'o-jail-free-chance',
    ],
  ],
];
