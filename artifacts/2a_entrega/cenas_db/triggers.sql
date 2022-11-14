/****
 When someone creates or updates a review, update the event average rating 
 ****/
CREATE FUNCTION update_event_rating () RETURNS TRIGGER AS $ BODY $ BEGIN
UPDATE
    event
SET
    avg_rating = (
        AVG(rating)
        FROM review
        WHERE
            eventID = NEW.eventID
    )
WHERE
    eventID = NEW.eventID eventID $ BODY $ LANGUAGE plpgsql;

CREATE TRIGGER event_avg_rating
AFTER
INSERT
    OR
UPDATE
    OR DELETE
    ON review EXECUTE PROCEDURE update_event_rating ();

/****
 When you try to enroll a event that is already at full capacity, an error message should be displayed
 ****/
CREATE FUNCTION check_capacity () RETURNS TRIGGER AS $ BODY $ BEGIN

IF 
		NOT EXISTS (SELECT capacity FROM event WHERE eventID = New.eventID && capacity >= 0) 
	THEN RAISE EXCEPTION 'This event % is already at full capacity', New.name; END IF; RETURN NEW; END $ BODY $ LANGUAGE plpgsql;

CREATE TRIGGER check_event_capacity BEFORE
INSERT
    ON ticket EXECUTE PROCEDURE check_capacity ();

/**** 
 When you buy or delete a ticket, update the corresponding event capacity
 ****/
CREATE FUNCTION _create_ticket () RETURN TRIGGER AS $ BODY $ BEGIN
UPDATE
    event
SET
    capacity = capacity - 1
WHERE
    eventID = NEW.eventID;

RETURN NEW;

END $ BODY $ LANGUAGE plpgsql;

CREATE FUNCTION _delete_ticket () RETURN TRIGGER AS $ BODY $ BEGIN
UPDATE
    event
SET
    capacity = capacity + 1
WHERE
    eventID = NEW.eventID;

RETURN NEW;

END $ BODY $ LANGUAGE plpgsql;

CREATE TRIGGER AS delele_ticket() BEFORE DELETE
ON ticket EXECUTE _delete_ticket();

CREATE TRIGGER AS create_ticket() BEFORE
INSERT
    ON TICKET EXECUTE _create_ticket();
