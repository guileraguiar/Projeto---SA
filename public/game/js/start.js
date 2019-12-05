var config = {
    type: Phaser.WEBGL,
    parent: 'content',
    width: 768,
    height: 384,
    zoom: 1.6,
    sound: Phaser.Sound,
    render: { pixelArt: true, antialias: true, autoResize: false },
    
    physics: {
        default: 'arcade',
        arcade: {
            gravity: { y: 0 },
            debug: false // set to true to view zones
        }
    },
    
    scene: [
        BootScene,
        MainMenu,
        WorldScene,
        TavernScene,
        CaveScene,
        BattleScene,
        CastleScene,
        HouseScene,
        FlorestScene,
        BossScene,
        UIScene
    ]
};
var game = new Phaser.Game(config);

//Spawn inicial do personagem
var spawnPoint = 'house';
var spawnFlorest = "spawn1";
var magicalKey = 0;
var blueKey = false; 
var redKey = false;
var goldenKey = false;
var houseKey = false;

// Atributos do Personagem
    var level = 1;
    var hp = 100;
    var mana = 100;
    var def = 1;
    var atk = 75;
    var experience = 0;
    var magicDescription = ["Incendiar","Barreira","Aprisionar"];
    var ignite = (level+atk)/2;
    var barreira = false;
    var prisão = false;


    //Itens consumiveis
    var itens = [];
    var itensDesc = [0,1,2,3];

    //itens não-consumíveis
    var armor = "N/A";
    var boots = "N/A";
    var weapon = "Adaga (+5 de Ataque)";
    var helmet = "N/A";
    var accessory = "N/A";

// Atributos dos Inimigos
    var hpEnemy = 10;
    var defEnemy = 1;
    var atkEnemy = 2;
    var expEnemy;
//Se 'boss' for true, os dados de inimigo serão atualizados
    var boss = false;

//XP ganha de acordo com level
/*
Level 1 --> 20xp por batalha
Level 5 --> 17xp por batalha
Level 10 --> 15xp por batalha
Level 15 --> 13xp por batalha
Level 25 --> 11xp por batalha
Level 26 --> 9xp por batalha
Level 27 --> 8xp por batalha
Level 28 --> 7xp por batalha
Level 29 --> 6xp por batalha
Level 30 = MAX
XP da Aranha = 30

*/

//Atributos Miranha
    var hpSpider = 250;
    var defSpider = 4;
    var atkSpider = 15;
//Variáveis dos baús já abertos
//Se for 'false', não abriu ainda.

var chestHouse1 = false;
var chestTavern1 = false;
var chestTavern3 = false;
var chestCave2 = false;
var chestCave3 = false;
var spider = false;

//NPCs que não repetem a fala
var npc7 = false;

//
var options;
var endGame;
