# Unilinkers - A Simple Property Management System

### Objective
Develop a simple PMS using Laravel and Javascript to perform CRUD operations for properties and rooms via API routes.

We recommend spending no more than 3 hours on this task. 

Don't worry if you don't get time to complete it, this is purely to assess your technical knowledge.

### Backend Requirements
Your API should include the following routes:

#### Properties
GET: /api/properties -> *returns a list of all properties*

GET: /api/properties/{property} -> *returns a specific property*

POST: /api/properties -> *creates a new property*

PUT: /api/properties/{property} -> *updates an existing property*

DELETE: /api/properties/{property} -> *deletes a property*

#### Rooms
GET: /api/rooms -> *returns a list of all rooms*

GET: /api/rooms/{property} -> *returns all rooms that belong to a specific property*

POST: /api/rooms -> *creates a new room*

PUT: /api/rooms/{room} -> *updates an existing room*

DELETE: /api/rooms/{room} -> *deletes a room*

### Frontend Requirements
Feel free to use your preferred JavaScript Framework (you can also use Inertia if you'd like).

#### Properties
- Create a view that lists all available properties.
- Create a form that allows you to add or edit a property.

#### Rooms
- On selecting a property, create a view that lists all available rooms for that property.
- Create a form that allows you to add or edit a room.

### Bonus
- API request validation.
- Use of interfaces.
- Use of service classes.
- Use of repository classes.
