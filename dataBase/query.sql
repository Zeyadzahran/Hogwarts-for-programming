
-- Insert Wands
INSERT INTO
    Wand (name, core, wood)
VALUES (
        'Holly - Phoenix Feather',
        'Phoenix Feather',
        'Holly'
    ),
    (
        'Holly - Dragon Heartstring',
        'Dragon Heartstring',
        'Holly'
    ),
    (
        'Holly - Unicorn Hair',
        'Unicorn Hair',
        'Holly'
    ),
    (
        'Holly - Thestral Tail Hair',
        'Thestral Tail Hair',
        'Holly'
    ),
    (
        'Yew - Phoenix Feather',
        'Phoenix Feather',
        'Yew'
    ),
    (
        'Yew - Dragon Heartstring',
        'Dragon Heartstring',
        'Yew'
    ),
    (
        'Yew - Unicorn Hair',
        'Unicorn Hair',
        'Yew'
    ),
    (
        'Yew - Thestral Tail Hair',
        'Thestral Tail Hair',
        'Yew'
    ),
    (
        'Elder - Phoenix Feather',
        'Phoenix Feather',
        'Elder'
    ),
    (
        'Elder - Dragon Heartstring',
        'Dragon Heartstring',
        'Elder'
    ),
    (
        'Elder - Unicorn Hair',
        'Unicorn Hair',
        'Elder'
    ),
    (
        'Elder - Thestral Tail Hair',
        'Thestral Tail Hair',
        'Elder'
    ),
    (
        'Willow - Phoenix Feather',
        'Phoenix Feather',
        'Willow'
    ),
    (
        'Willow - Dragon Heartstring',
        'Dragon Heartstring',
        'Willow'
    ),
    (
        'Willow - Unicorn Hair',
        'Unicorn Hair',
        'Willow'
    ),
    (
        'Willow - Thestral Tail Hair',
        'Thestral Tail Hair',
        'Willow'
    ),
    (
        'Hawthorn - Phoenix Feather',
        'Phoenix Feather',
        'Hawthorn'
    ),
    (
        'Hawthorn - Dragon Heartstring',
        'Dragon Heartstring',
        'Hawthorn'
    ),
    (
        'Hawthorn - Unicorn Hair',
        'Unicorn Hair',
        'Hawthorn'
    ),
    (
        'Hawthorn - Thestral Tail Hair',
        'Thestral Tail Hair',
        'Hawthorn'
    ),
    (
        'Oak - Phoenix Feather',
        'Phoenix Feather',
        'Oak'
    ),
    (
        'Oak - Dragon Heartstring',
        'Dragon Heartstring',
        'Oak'
    ),
    (
        'Oak - Unicorn Hair',
        'Unicorn Hair',
        'Oak'
    ),
    (
        'Oak - Thestral Tail Hair',
        'Thestral Tail Hair',
        'Oak'
    );

-- Insert Houses
INSERT INTO
    House (name, points)
VALUES ('Gryffindor', 0),
    ('Slytherin', 0),
    ('Ravenclaw', 0),
    ('Hufflepuff', 0);

-- Insert Users 
INSERT INTO
    User (
        name,
        email,
        role,
        password,
        wand_id,
        house_id
    )
VALUES (
        'Albus Dumbledore',
        'dumbledore@hogwarts.edu',
        'Admin',
        '123',
        1,
        NULL
    ),
    (
        'Severus Snape',
        'snape@hogwarts.edu',
        'Admin',
        '123',
        2,
        NULL
    ),
    (
        'Minerva McGonagall',
        'mcgonagall@hogwarts.edu',
        'Admin',
        '123',
        3,
        NULL
    ),
    (
        'Filius Flitwick',
        'flitwick@hogwarts.edu',
        'Admin',
        '123',
        4,
        NULL
    ),
    (
        'Pomona Sprout',
        'sprout@hogwarts.edu',
        'Admin',
        '123',
        5,
        NULL
    ),
    (
        'Horace Slughorn',
        'slughorn@hogwarts.edu',
        'Admin',
        '123',
        6,
        NULL
    ),
    (
        'Remus Lupin',
        'lupin@hogwarts.edu',
        'Admin',
        '123',
        7,
        NULL
    ),
    (
        'Gilderoy Lockhart',
        'lockhart@hogwarts.edu',
        'Admin',
        '123',
        8,
        NULL
    ),
    (
        'Zeyad',
        'zeyad@hogwarts.edu',
        'Admin',
        '123',
        9,
        NULL
    ),
    (
        'Tahany',
        'tahany@hogwarts.edu',
        'Admin',
        '123',
        10,
        NULL
    ),
    (
        'Shams',
        'shams@hogwarts.edu',
        'Admin',
        '123',
        11,
        NULL
    ),
    (
        'Mohamed',
        'mohamed@hogwarts.edu',
        'Admin',
        '123',
        12,
        NULL
    );

-- Insert Items
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
    ),
    (
        'Shadowveil Cloak',
        'A flowing black cloak infused with shadow magic, allowing the wearer to blend into darkness.',
        'img/Shadowveil_Cloak.png'
    ),
    (
        'Runebound Grimoire',
        'An ancient tome filled with powerful incantations, its pages shimmer with arcane symbols.',
        'img/Runebound_Grimoire.png'
    );

-- Insert Courses
INSERT INTO
    Course (name, professor_id)
VALUES ('Dark Arts Encryption', 2),
    ('Potion Machine Learning', 2),
    (
        'Transfiguration Algorithms',
        3
    ),
    ('Computational Animagi', 3),
    ('Charms Compiler Design', 4),
    ('Voice-Activated Coding', 4),
    (
        'Magical Creatures Database',
        5
    ),
    ('Care of Magical Servers', 5),
    (
        'Herbology Neural Networks',
        6
    ),
    ('Plant-based AI', 6),
    (
        'Memory Optimization Potions',
        7
    ),
    (
        'Elixir of Code Refactoring',
        7
    ),
    ('Defensive Cybersecurity', 8),
    ('Werewolf Cryptography', 8),
    ('Self-Replicating Code', 9),
    ('Memory Charm Programming', 9),
    ('Quantum Spell Computing', 10),
    ('Magical AI Ethics', 10),
    ('Divination Data Science', 11),
    (
        'Predictive Spell Analytics',
        11
    ),
    (
        'Cloud Broomstick Architecture',
        12
    ),
    (
        'Flying Server Maintenance',
        12
    ),
    ('Blockchain Potions', 13),
    ('Smart Contract Charms', 13);
   
    



