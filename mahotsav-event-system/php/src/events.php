<?php
// php/src/events.php
// Festive college theme: hardcoded categories, subcategories and events.
// All image paths are relative to php/public/, e.g. assets/images/categories/cultural.jpg
return [

  /* -------------------- Cultural -------------------- */
  "Cultural" => [
    "meta" => [
      "image" => "assets/images/categories/cultural.jpg",
      "color" => "#ff6f61"
    ],
    "subcategories" => [
      "Music" => [
        "meta" => ["image" => "assets/images/subcats/music.jpg"],
        "events" => [
          [
            "slug" => "solo-singing",
            "name" => "Solo Singing",
            "image" => "assets/images/cultural-events/solo-singing.jpg",
            "short" => "Individual vocal performance.",
            "rules" => "Max 5 minutes. No profanity. Participants must carry ID.",
            "prizes" => "1st ₹4000, 2nd ₹2000, 3rd ₹1000",
            "contact" => ["music: 9876543210"]
          ],
        ]
      ],
      "Dance" => [
        "meta" => ["image" => "assets/images/subcats/dance.jpg"],
        "events" => [
          [
            "slug" => "solo-dance",
            "name" => "Solo Dance",
            "image" => "assets/images/cultural-events/solo-dance.jpg",
            "short" => "Solo dance performance.",
            "rules" => "3-6 minute performance. Props allowed if pre-declared.",
            "prizes" => "1st ₹4000, 2nd ₹2000",
            "contact" => ["dance-coord: 9012345678"]
          ],
        ]
      ],
      "Dramatics" => [
        "meta" => ["image" => "assets/images/subcats/dramatics.jpg"],
        "events" => [
          [
            "slug" => "one-act-play",
            "name" => "One Act Play",
            "image" => "assets/images/cultural-events/one-act-play.jpg",
            "short" => "20 minute play.",
            "rules" => "Max 20 minutes. Props allowed.",
            "prizes" => "1st ₹8000, 2nd ₹4000",
            "contact" => ["drama-coord: 9123456789"]
          ]
        ]
      ],
      "Literary" => [
        "meta" => ["image" => "assets/images/subcats/literary.jpg"],
        "events" => [
          [
            "slug" => "debate",
            "name" => "Debate",
            "image" => "assets/images/cultural-events/debate.jpg",
            "short" => "Team debate competition.",
            "rules" => "Teams of 2. Time limits as announced.",
            "prizes" => "1st ₹3000, 2nd ₹1500",
            "contact" => ["lit-coord: 9112233445"]
          ]
        ]
      ],
      "Fine Arts" => [
        "meta" => ["image" => "assets/images/subcats/finearts.jpg"],
        "events" => [
          [
            "slug" => "painting",
            "name" => "Painting",
            "image" => "assets/images/cultural-events/painting.jpg",
            "short" => "Canvas painting competition.",
            "rules" => "Bring your own materials. 2-hour time limit.",
            "prizes" => "1st ₹3000, 2nd ₹1500",
            "contact" => ["art-coord: 9900112233"]
          ]
        ]
      ],
      "Fashion & Spotlight" => [
        "meta" => ["image" => "assets/images/subcats/fashion.jpg"],
        "events" => [
          [
            "slug" => "fashion-show",
            "name" => "Fashion Show",
            "image" => "assets/images/cultural-events/fashion-show.jpg",
            "short" => "Ramp walk and style contest.",
            "rules" => "Team or solo. Stage time max 6 minutes.",
            "prizes" => "1st ₹6000, 2nd ₹3000",
            "contact" => ["fashion-coord: 9988776655"]
          ]
        ]
      ],
    ]
  ],

  /* -------------------- Sports -------------------- */
  "Sports" => [
    "meta" => [
      "image" => "assets/images/categories/sports.jpg",
      "color" => "#1db954"
    ],
    "subcategories" => [
      "Team Events" => [
        "meta" => ["image" => "assets/images/subcats/team.jpg"],
        "events" => [
          [
            "slug" => "volleyball",
            "name" => "Volleyball",
            "image" => "assets/images/sports-events/volleyball.jpg",
            "short" => "Team Events - men & women",
            "rules" => "Team strength is 6+4 players. Match will be organized for a total of 3 sets ...",
            "prizes" => "Men: 1st ₹30000, 2nd ₹20000; Women: 1st ₹15000, 2nd ₹10000",
            "contact" => ["abc: 5678987643","def: 6789012345"]
          ],
        ]
      ],
      "Individual Events" => [
        "meta" => ["image" => "assets/images/subcats/individual.jpg"],
        "events" => [
          [
            "slug" => "chess",
            "name" => "Chess Championship",
            "image" => "assets/images/sports-events/chess.jpg",
            "short" => "Individual chess tournament.",
            "rules" => "Swiss format, time control 15+10.",
            "prizes" => "1st ₹5000, 2nd ₹3000",
            "contact" => ["chess-coord: 9876543210"]
          ]
        ]
      ],
      "Para Sports" => [
        "meta" => ["image" => "assets/images/subcats/para.jpg"],
        "events" => [
          [
            "slug" => "wheelchair-race",
            "name" => "Wheelchair Race",
            "image" => "assets/images/sports-events/wheelchair.jpg",
            "short" => "Para-sports wheelchair race.",
            "rules" => "Standard wheelchair race rules.",
            "prizes" => "Medals & certificates",
            "contact" => ["para-coord: 9776655443"]
          ]
        ]
      ],
      "Track & Field" => [
        "meta" => ["image" => "assets/images/subcats/track.jpg"],
        "events" => [
          [
            "slug" => "100m-run",
            "name" => "100m Run",
            "image" => "assets/images/sports-events/100m.jpg",
            "short" => "Sprint event.",
            "rules" => "Standard track rules. Heats followed by final.",
            "prizes" => "Medals & certificates",
            "contact" => ["track-coord: 9988776655"]
          ]
        ]
      ],
    ]
  ]
];
