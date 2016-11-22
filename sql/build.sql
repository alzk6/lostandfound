--This file builds the tables for the database
--Last updated 11/13/16 By Benjamin Krueger

CREATE TABLE Item_Entry(
    entry_id INTEGER PRIMARY KEY
);

CREATE TABLE Finds(
    find_id INTEGER REFERENCES Item_Entry(entry_id),
    user_name VARCHAR(40) REFERENCES Trusted_Staff
);
CREATE TABLE Submitted_by(
    User_id CHAR(8) REFERENCES Trusted_Staff(User_id),
    Submit_id INTEGER REFERENCES Item_Entry(entry_id)
);
CREATE TABLE Describes(
    desc_id INTEGER REFERENCES Item_Entry(entry_id)
    --seriously whats the point of this table?
);
CREATE TABLE Description(
    Type VARCHAR(400),
    color VARCHAR(20),
    d_id INTEGER REFERENCES Item_Entry(entry_id)
);
CREATE TABLE Discovery_event(
    disc_id REFERENCES Item_Entry(entry_id),
    found_by REFERENCES Trusted_Staff(user_name),
    date_found DATE,
    Bldg VARCHAR(20),
    room VARCHAR(20)
);

CREATE TABLE Trusted_Staff(
    User_id CHAR(8),
    user_name VARCHAR(40),
    First VARCHAR(20),
    Last VARCHAR(20),
    Middle VARCHAR(20),
    Password VARCHAR(40),
    PRIMARY KEY(User_id,user_name)
);

CREATE TABLE Item_Claimed(
    F_name VARCHAR(20),
    M_name VARCHAR(20),
    L_name VARCHAR(20),
    Date_claimed DATE,
    Username PRIMARY KEY,
    Claim_ID INTEGER REFERENCES Item_Entry(entry_id)
);

CREATE TABLE Non_Recoverable(
    entry_id REFERENCES Item_Entry
);
--BEGIN INSERTING TEST DATA INTO DATABASE....

INSERT INTO Trusted_Staff
Values("00000000","bokkw4","Benjamin","Krueger","Oliver","$2y$10$sJYahZ2qOH5.gZHLTMLml.d00NMaFt7mSx3xvAyZC4PKEEULON2si");

--Password field is "dankmemes" put through the php cryptohash function
--storing hashes of Password is pretty standard practice.
--Add item to database
INSERT INTO Item_Entry Values(0);
INSERT INTO Finds Values(0,"bokkw4");
INSERT INTO Submitted_by Values("00000000",0);
INSERT INTO Describes Values(0);
INSERT INTO Description Values("Backpack","RED",0);
INSERT INTO Discovery_event Values(0,"bokkw4", '2016:11:22 15:00', "Library","115");

