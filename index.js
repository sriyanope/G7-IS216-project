let Express = require("express");
let Mongoclient = require("mongodb").MongoClient;
let cors = require("cors");
const multer = require("multer");


async function main(){
    /**
     * Connection URI. Update <username>, <password>, and <your-cluster-url> to reflect your cluster.
     * See https://docs.mongodb.com/ecosystem/drivers/node/ for more details
     */
    const uri = "mongodb+srv://sriya:greenguardians@is216-wad2.ylfysy8.mongodb.net/?retryWrites=false&w=majority&appName=AtlasApp";
 

    const client = new Mongoclient(uri);
 
    try {
        // Connect to the MongoDB cluster
        await client.connect();
 
        // Make the appropriate DB calls
        await  listDatabases(client);
        console.log("Connection to MongoDB successful");
 
    } catch (e) {
        console.error(e);
    } finally {
        await client.close();
    }
}

main().catch(console.error);

async function listDatabases(client){
    databasesList = await client.db().admin().listDatabases();
 
    console.log("Databases:");
    databasesList.databases.forEach(db => console.log(` - ${db.name}`));
};
 

// function to change the sign in button to my profile after on click


// let app = Express();
// app.use(cors());

// let CONNECTION_STRING = "mongodb+srv://sriya:greenguardians@is216-wad2.ylfysy8.mongodb.net/?retryWrite s=true&w=majority&appName=AtlasApp";

// let DATABASENAME = "is216-wad2";
// let database;


// app.listen(27017, ()=>{
//     Mongoclient.connect(CONNECTION_STRING, (error, client)=>{
//         database=client.db(DATABASENAME);
//         console.log("Mongo DB connection successful");
//     })
// })