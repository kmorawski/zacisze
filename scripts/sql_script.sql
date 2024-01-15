-- Zadanie 2.1
CREATE SCHEMA bookstore AUTHORIZATION postgres;

CREATE SEQUENCE bookstore.author_sequence
    INCREMENT BY 1
    MINVALUE 1
    MAXVALUE 9223372036854775807
    START 1
	CACHE 1
	NO CYCLE;

CREATE SEQUENCE bookstore.book_sequence
    INCREMENT BY 1
    MINVALUE 1
    MAXVALUE 9223372036854775807
    START 1
	CACHE 1
	NO CYCLE;

CREATE SEQUENCE bookstore.review_sequence
    INCREMENT BY 1
    MINVALUE 1
    MAXVALUE 9223372036854775807
    START 1
	CACHE 1
	NO CYCLE;

CREATE TABLE bookstore.author (
    id int4 NOT NULL DEFAULT nextval('bookstore.author_sequence'::regclass),
    first_name varchar(15) NOT NULL,
    last_name varchar(30) NOT NULL,
    CONSTRAINT author_pk PRIMARY KEY (id)
);

CREATE TABLE bookstore.book (
    id int4 NOT NULL DEFAULT nextval('bookstore.book_sequence'::regclass),
    publish_year int4 NOT NULL,
    isbn varchar(13) NOT NULL,
    CONSTRAINT books_pk PRIMARY KEY (id)
);

CREATE TABLE bookstore.book_review (
    id int4 NOT null DEFAULT nextval('bookstore.review_sequence'::regclass),
    rate int4 NOT NULL,
    description text NULL,
    book_id int4 NOT NULL,
    CONSTRAINT book_review_pk PRIMARY KEY (id),
    CONSTRAINT book_review_book_fk FOREIGN KEY (book_id) REFERENCES bookstore.book(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE bookstore.book_author (
    book_id int4 NOT NULL,
    author_id int4 NOT NULL,
    CONSTRAINT book_author_author_fk FOREIGN KEY (author_id) REFERENCES bookstore.author(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT book_author_book_fk FOREIGN KEY (book_id) REFERENCES bookstore.book(id)
);

CREATE INDEX book_author_author_id_idx ON bookstore.book_author USING btree (author_id);
CREATE INDEX book_author_book_id_idx ON
    bookstore.book_author
    using btree (book_id);


-- Fistures
INSERT INTO bookstore.author (first_name,last_name) VALUES
('Jan','Cabacki'),
('Adam','Dabacki'),
('Piotr','Ebacki'),
('Paweł','Subacki'),
('Kazimierz','Lybacki');

INSERT INTO bookstore.book (publish_year,isbn,title) VALUES
(2024,'12222222','My first book');

INSERT INTO bookstore.book_author (book_id,author_id) VALUES
(2,1),
(2,3);

INSERT INTO bookstore.book_review (rate,description,book_id) VALUES
(4,'jakiś opis',2);

INSERT INTO bookstore.valid_reviews (review) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10);
-- end fixtures

-- Zadanie 2.2
select a.first_name, a.last_name, count(ba.book_id)
from author a
left join book_author ba on ba.author_id = a.id
group by a.id;

-- Zadanie 2.3
CREATE OR REPLACE VIEW bookstore.top_five_autors
AS
select
    a.first_name,
    a.last_name,
    avg(br.rate)
from author a
left join book_author ba on ba.author_id = a.id
inner join book_review br on br.book_id = ba.book_id
group by a.id
order by avg(br.rate) desc
    limit 5;