/*Category table created and initial pk set to 1001*/
CREATE TABLE category(
    id INT(5) NOT NULL auto_increment,
	name VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
);

ALTER TABLE category AUTO_INCREMENT = 1001;

/*article table created and initial pk set to 2001*/
CREATE TABLE article(

    id INT(5) NOT NULL auto_increment,
    title VARCHAR(255) NOT NULL,
    content VARCHAR(255) NOT NULL,
    categoryId INT(5) NOT NULL,
    publishDate DATETIME NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (categoryId) REFERENCES category(id)
);

ALTER TABLE article AUTO_INCREMENT = 2001;

/*User table created*/
CREATE TABLE users(

    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (email)
);

/*Data inserted in catagory table*/
INSERT INTO category(name)
VALUES('Sports'),
    ('Politics'),
    ('Education'),
    ('Fitness');

/*Data inserted in article table*/

/*articles from: nytimes.com/international/section/politics, https://www.nytimes.com/international/section/sports, https://leverageedu.com/blog/article-on-importance-of-education/, https://www.aplustopper.com/article-on-importance-of-education-in-our-life/, https://www.activebeat.com/your-health/men/?utm_medium=afssl&utm_source=google&utm_campaign=12345830152&utm_content=g_c_498614775285&cus_widget=&utm_term=articles%20of%20fitness&cus_teaser=kwd-2689913082&utm_acid=3123079991&utm_caid=12345830152&utm_agid=119510326004&utm_os=&utm_pagetype=multi&gclid=CjwKCAjw-L-ZBhB4EiwA76YzOVmuDCxTBgWQkGSmF9cx3gxIvN66wpKggvStwaAGE-Bb65DcvPX0zhoCA-QQAvD_BwE*/


/*Data inserted in users table*/
INSERT INTO users(fullname, email, password)
VALUES('user', 'user@gmail.com', 'password'),
    ('john', 'john@gmail.com', 'password'),
    ('dummy', 'dummy@gmail.com', 'password'),
    ('person', 'person@gmail.com', 'password');

/*articles source: https://abcnews.go.com/Sports/, https://hbswk.hbs.edu/Pages/browse.aspx?HBSTopic=Government%20and%20Politics, https://www.educationnext.org/top-20-education-next-articles-2021/, 
*/
INSERT INTO article(title, content, categoryId, publishDate)
VALUES('Floyd Mayweather drubs Mikuru',
         'Floyd Mayweather is still winning boxing matches, even if they wont go on his official pro record.',
          1001, '1000-02-01 10:30:10'),

      ('Los Angeles Chargers QB Justin Herbert ribs expected to decide on pain-killing shot during Sunday', 'Los Angeles Chargers quarterback Justin Herbert is expected to make a decision during pregame warm-ups on Sunday about', 1001, '1000-03-01 10:30:10'),

      ('Source: Arizona Cardinals James Conner ankle on track to play vs. Rams', 'Arizona Cardinals running back James Conner will test his injured ankle before Sundays game against the Los Angeles Rams but he is on track to play', 1001, '1000-04-01 10:30:10'),

      ('How Partisan Politics Play Out in American Boardrooms', 'The discord gripping the nation has reached the heights of corporate America with costly consequences for companies and investors. Research by Elisabeth Kempf shows just how polarized the executive suite has become.', 1002, '1000-05-01 10:30:10'),

      ('Racism, Colonialism, and Britains Legacy of Violence', 'In a new book, Pulitzer Prize-winning author Caroline Elkins shows how Britain exported and institutionalized racially motivated violence, and covered it up as the country lost its grip on imperial rule.', 1002, '1000-06-01 10:30:10'),

      ('As Disney Board Chair, What Would You Advise CEO Bob Chapek Regarding Dont Say Gay?', 'Disney started the year off strong—until a controversial new law in Florida set off a public firestorm.', 1002, '1000-07-01 10:30:10'),
      
      ('Betsy DeVos and the Future of Education Reform', 'My years as assistant secretary of education gave me a firsthand look at how infighting among education reformers is hampering progress toward change.', 1003, '1000-08-01 10:30:10'),

      ('Whats Next in New Orleans', 'The Louisiana city has the most unusual school system in America. But can the new board of a radically decentralized district handle the latest challenges?
        By Danielle Dreilinger', 1003, '1000-09-01 10:30:10'),

      ('The Orchid and the Dandelion', 'New research uncovers a link between a genetic variation and how students respond to teaching. The potential implications for schools—and society—are vast.
        By Laurence Holt', 1003, '1000-10-01 10:30:10'),
      
      ('Computer Science for All?', 'As a new subject spreads, debates flare about precisely what is taught, to whom, and for what purpose By Jennifer Oldham', 1004, '1000-12-01 10:30:10'),

      ('7 Common Symptoms of Carpal Tunnel Syndrome', 'Carpal tunnel syndrome affects the median nerve of the carpal tunnel in the wrist. The syndrome itself can be temporary, but its oftentimes the result of repetitive stress that persists and gradually worsens. We look into the 8 telling symptoms.', 1004, '1001-02-01 10:30:10'),

      ('A Beginners Guide to Self-Care for Men', 'Self-care is often geared toward women but the fact is, its just as important for men. Prioritizing yourself both physically and mentally', 1004, '1003-02-01 10:30:10');