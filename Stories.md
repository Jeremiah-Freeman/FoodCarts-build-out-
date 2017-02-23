  ## These are the stories of working through bugs:

  | Issue | Steps taken | Lesson learned |
  |-------|-------------|----------------|
  | Cuisine getAll not returning object | check database connection, add echos, check variable names | make sure you don't name variables the same name - use descriptive variable names|
  | Trying to test address object save and getAll is not cooperating.  When get all is ran having issues with recreating city and state names based on return query of cities table and states table | Echo everything.  Still murky.  Plain english walk through.





// in theory

in our save
we first insert into our cities table our city name and then get the id that was assigned to it and save it to our address object city_id

we then insert into our states table our state name and then get the id that was assigned to it and save it to our address object state_id

we then insert into our addresses table our objects city ID, StateID, street, and zip 
