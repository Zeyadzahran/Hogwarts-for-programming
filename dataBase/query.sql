-- Active: 1742393829846@@127.0.0.1@3306@hogwarts
INSERT INTO
    Wand (name, core, wood)
VALUES (
        'Phoenix’s Blessing',
        'Phoenix Feather',
        'Holly'
    ),
    (
        'Inferno’s Embrace',
        'Dragon Heartstring',
        'Holly'
    ),
    (
        'Celestial Whisper',
        'Unicorn Hair',
        'Holly'
    ),
    (
        'Veil of Shadows',
        'Thestral Tail Hair',
        'Holly'
    ),
    (
        'Eclipse of the Phoenix',
        'Phoenix Feather',
        'Yew'
    ),
    (
        'Drake’s Wrath',
        'Dragon Heartstring',
        'Yew'
    ),
    (
        'Moonlit Harmony',
        'Unicorn Hair',
        'Yew'
    ),
    (
        'Dark Vein',
        'Thestral Tail Hair',
        'Yew'
    ),
    (
        'Elder’s Requiem',
        'Phoenix Feather',
        'Elder'
    ),
    (
        'Dragon’s Legacy',
        'Dragon Heartstring',
        'Elder'
    ),
    (
        'Aurora’s Gift',
        'Unicorn Hair',
        'Elder'
    ),
    (
        'Phantom’s Grasp',
        'Thestral Tail Hair',
        'Elder'
    ),
    (
        'Willow’s Fireheart',
        'Phoenix Feather',
        'Willow'
    ),
    (
        'Stormbinder',
        'Dragon Heartstring',
        'Willow'
    ),
    (
        'Serenity’s Light',
        'Unicorn Hair',
        'Willow'
    ),
    (
        'Duskrender',
        'Thestral Tail Hair',
        'Willow'
    ),
    (
        'Hawthorn’s Rising Ember',
        'Phoenix Feather',
        'Hawthorn'
    ),
    (
        'Wyvern’s Fang',
        'Dragon Heartstring',
        'Hawthorn'
    ),
    (
        'Ethereal Bond',
        'Unicorn Hair',
        'Hawthorn'
    ),
    (
        'Nightshade’s Lament',
        'Thestral Tail Hair',
        'Hawthorn'
    ),
    (
        'Oak’s Phoenix Brand',
        'Phoenix Feather',
        'Oak'
    ),
    (
        'Titan’s Roar',
        'Dragon Heartstring',
        'Oak'
    ),
    (
        'Silverbrook’s Touch',
        'Unicorn Hair',
        'Oak'
    ),
    (
        'Midnight Fang',
        'Thestral Tail Hair',
        'Oak'
    );

INSERT INTO
    House (name, points)
VALUES ('Gryffindor', 0),
    ('Slytherin', 0),
    ('Ravenclaw', 0),
    ('Hufflepuff', 0);



INSERT INTO
    item (name, description, path)
VALUES (
        'Astral Essence Vial',
        'A mystical potion encased in a delicate glass bottle .',
        'img/Astral_Essence_Vial.png'
    ),
    (
        'Ring of the Arcane Tempest',
        'A finely crafted ring of dark, ancient metal .',
        'img/Ring_of_the_Arcane_Tempest.png'
    ),
    (
        'Lunar Enchantment Pendant',
        'This exquisite crescent moon pendant glows softly with an ethereal light.',
        'img/Lunar_Enchantment_Pendant.png'
    ),
    (
        'Arcane Mirror',
        'An ancient mirror infused with glowing runes, capable of revealing hidden truths.',
        'img/Arcane_Mirror.png'
    ),
    (
        'Moonlit Scepter',
        'A mystical scepter radiating celestial energy, wielded by high sorcerers.',
        'img/Moonlit_Scepter.png'
    ),
    (
        'Ethereal Timepiece',
        'A pocket watch that bends time itself, opening glimpses into the past and future.',
        'img/Ethereal_Timepiece.png'
    ),
    (
        'Quill of Enchantment',
        'A golden quill that writes by itself, transcribing forgotten spells and secrets.',
        'img/Quill_of_Enchantment.png'
    ),
    (
        'Flaming Poison Vial',
        'A glass vial containing a swirling, fiery liquid marked as poison, emitting a faint smoke.',
        'img/Flaming Poison Vial.png'
    ),
    (
        'Enchanted Crystal Orb',
        'A mystical blue crystal ball resting on an ornate golden base, swirling with ethereal energy.',
        'img/Enchanted Crystal Orb.png'
    ),
    (
        'Flaming Arcane Wand',
        'A beautifully crafted magical wand covered in glowing runes, engulfed in arcane flames.',
        'img/Flaming Arcane Wand.png'
    ),
    (
    'Starlit Sorcerer’s Staff',
    'A tall, elegant staff of darkwood with a floating crystal orb radiating cosmic energy.',
    'img/Starlit_Sorcerers_Staff.png'
    ),(
    'Shadowveil Cloak',
    'A flowing black cloak infused with shadow magic, allowing the wearer to blend into darkness.',
    'img/Shadowveil_Cloak.png'
    ),
    (
    'Runebound Grimoire',
    'An ancient tome filled with powerful incantations, its pages shimmer with arcane symbols.',
    'img/Runebound_Grimoire.png'
    );



  
    INSERT INTO
    User (
        name,
        email,
        role,
        password,
        wand_id
    )
VALUES (
        'Albus Dumbledore',
        'dumbledore@hogwarts.edu',
        'Admin',
        '123',
        1
    ),
    (
        'Severus Snape',
        'snape@hogwarts.edu',
        'Admin',
        '123',
        2
    ),
    (
        'Minerva McGonagall',
        'mcgonagall@hogwarts.edu',
        'Admin',
        '123',
        3
    ),
    (
        'Filius Flitwick',
        'flitwick@hogwarts.edu',
        'Admin',
        '123',
        4
    ),
    (
        'Pomona Sprout',
        'sprout@hogwarts.edu',
        'Admin',
        '123',
        5
    ),
    (
        'Horace Slughorn',
        'slughorn@hogwarts.edu',
        'Admin',
        '123',
        6
    ),
    (
        'Remus Lupin',
        'lupin@hogwarts.edu',
        'Admin',
        '123',
        7
    ),
    (
        'Gilderoy Lockhart',
        'lockhart@hogwarts.edu',
        'Admin',
        '123',
        8
    ),
    (
        'Zeyad',
        'zeyad@hogwarts.edu',
        'Admin',
        '123',
        9
    ),
    (
        'Tahany',
        'tahany@hogwarts.edu',
        'Admin',
        '123',
        10
    ),
    (
        'Shams',
        'shams@hogwarts.edu',
        'Admin',
        '123',
        11
    ),
    (
        'Mohamed',
        'mohamed@hogwarts.edu',
        'Admin',
        '123',
        12
    );
   INSERT INTO
    Course (name, professor_id)
VALUES ('Advanced Potion Making', 2),
    (
        'Dark Arts and Cybersecurity',
        2
    ),
    (
        'Ethical Hacking with Dark Magic',
        2
    ),
    ('Transfiguration', 3),
    (
        'Object-Oriented Spellcasting',
        3
    ),
    ('Data Structures in Magic', 3),
    ('Charms', 4),
    (
        'Algorithms and Enchantments',
        4
    ),
    ('AI and Spell Automation', 4),
    ('Herbology', 5),
    (
        'Potion Ingredients and Their Algorithms',
        5
    ),
    (
        'Green Computing and Magical Sustainability',
        5
    ),
    ('Advanced Potion Brewing', 6),
    (
        'Database Alchemy: SQL & Potions',
        6
    ),
    (
        'System Security and Magical Defenses',
        6
    ),
    (
        'Defense Against the Dark Arts',
        7
    ),
    (
        'Cyber Defense Against Black Hat Wizards',
        7
    ),
    (
        'Penetration Testing with Magic',
        7
    ),
    ('Magical Public Speaking', 8),
    (
        'Frontend Enchantments: UI/UX Magic',
        8
    ),
    (
        'Introduction to Wizarding Journalism',
        8
    ),
    (
        'Cryptography and Ancient Runes',
        9
    ),
    (
        'Machine Learning for Spell Prediction',
        9
    ),
    (
        'Game Development with Magic',
        9
    ),
    (
        'Network Security and Protective Spells',
        10
    ),
    (
        'Full Stack Magic: Web Development',
        10
    ),
    (
        'Defensive Coding and Magical Debugging',
        10
    ),
    (
        'Cybersecurity for Wizards',
        11
    ),
    (
        'Deep Learning for Magical AI',
        11
    ),
    (
        'Hacking Spells and Countermeasures',
        11
    ),
    (
        'Blockchain and Magical Smart Contracts',
        12
    ),
    (
        'Operating Systems in the Wizarding World',
        12
    ),
    (
        'Cloud Computing and Floating Data Charms',
        12
    );


INSERT INTO Course (name)
VALUES 
    ('Math'),
    ('Algorithm'),
    ('Operating System');
