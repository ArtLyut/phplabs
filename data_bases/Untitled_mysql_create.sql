CREATE TABLE Auto (
	id INT NOT NULL AUTO_INCREMENT,
	owner INT NOT NULL,
	number TEXT NOT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE Pass (
	id INT NOT NULL AUTO_INCREMENT,
	auto INT,
	auto_info TEXT,
	PRIMARY KEY (id)
);

CREATE TABLE Owners (
	fio VARCHAR(255) NOT NULL,
	id INT NOT NULL AUTO_INCREMENT UNIQUE,
	PRIMARY KEY (id)
);

ALTER TABLE Auto ADD CONSTRAINT Auto_fk0 FOREIGN KEY (owner) REFERENCES Owners(id);

ALTER TABLE Pass ADD CONSTRAINT Pass_fk0 FOREIGN KEY (auto) REFERENCES Auto(id);
