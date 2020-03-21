# fixyourfunnel
Technical Assessment for FixYourFunnel

Question 1
A SQL database table has grown very large. It has over 100,000,000 entries. The table is written to and read
from with some frequency. The table may need to be “sharded” without impacting the use of the software. How
would you solve this problem? If there is a better solution, what would that be?

I want to preface this answer by outlining that I believe that there is no perfect answer to this question. The CAP theorem comes into play here - issue with achieving high levels of all 3 - consistency, availability and performance. There are going to have to be trade offs. No such thing as a magic bullet - complexity is moved to some layer no matter where that is. 

Some answers that would help guide this design better:
- What was the rate of growth of the 100 milliton entries?
- What is the expected rate of growth of these entries?

The rate and the variability in the rate of growth of data in the table are important considerations to have when trying to upgrade the existing systems. There are a few different ways to achieve sharding, but each comes with its set of advantages and disadvantages. The business logic and operations of a company help determine the most suitable strategy. 

 Horizontal Sharding/ Range Based Sharding / Entity Grouping
- Application layer is relatively simple
- RDBMS sharding solution
- Each shard has same schema
- User data kept together on same shard
- Improves query efficiency
- Improves consistency
- Cross shard queries are expensive and should be limited
- Issue is that power users can unevenly distribute data leading to retarding in a different way than originally intended causing incoherence with underlying business logic.

Vertical Sharding
- Here based on the business logic/feature you might split your database into different shards. For example, for an intstagram type application the user profiles might be on one shard, while comments might be another shard.
- Advantage is that separate out types of data from critical to non-critical so you can handle them differently
- Disadvantage here is cross partition querying to retrieve meaningful data
- Additional growth becomes challenging due to retarding the feature specific shard

Hashing
- Hashes shard key’s value
- Hashes determine which shard the data lives in
- Evenly distributes the data to avoid hotspots (by using modulo function)
- Data with close shard keys is likely to be placed together
- Adding and removing of nodes/servers becomes challenging because the modulo function now changes

Consistent  Hashing 
- Solves the elasticity problem with hashing strategy
- Good for DBs with varying loads where nodes might need to be added or removed with some frequency

Directory Based Sharding / Sharding Map Manager
- Look up table that determines your shard
- Helps with solving with the elasticity issue of adding and removing nodes

Replication is another important consideration. The strategy could be to have an independent replication strategy or it could be closely tied to the sharing strategy.

Ultimately, the most appropriate sharding solution truly comes down to the business logic. My opinion is that sharding should be avoided as much and for as long as one can. There are many ways to structure the schema and business logic in ways to reduce the need for sharding as the first solution.

