
var BootScene = new Phaser.Class({

    Extends: Phaser.Scene,

    initialize:

    function BootScene ()
    {
        Phaser.Scene.call(this, { key: 'BootScene' });
    },

    preload: function ()
    {
    
    },

    create: function ()
    {
        debugger;
        // start the WorldScene
        this.scene.start('MainMenu');
       
    }
});
var MainMenu = new Phaser.Class({

    Extends: Phaser.Scene,

    initialize:

    function MainMenu ()
    {
        Phaser.Scene.call(this, { key: 'MainMenu' });
    },

    preload: function ()
    {
        this.load.spritesheet('player', 'assets/tilesets/geraldo.png', { frameWidth: 16, frameHeight: 16 });
        this.load.spritesheet('door', 'assets/tilesets/woodDoor.png', { frameWidth: 16, frameHeight: 16 });
        this.load.spritesheet('prision-door', 'assets/tilesets/prision-door.png', { frameWidth: 16, frameHeight: 16 });
        this.load.spritesheet('blue-door', 'assets/tilesets/blue-door.png', { frameWidth: 16, frameHeight: 16 });
        this.load.spritesheet('scroll', 'assets/tilesets/scroll.png', { frameWidth: 10, frameHeight: 10 });
        this.load.spritesheet('npc', 'assets/tilesets/npc.png', { frameWidth: 13, frameHeight: 13 });
        this.load.spritesheet('king', 'assets/tilesets/king.png', { frameWidth: 16, frameHeight: 16 });
        this.load.spritesheet('mirror', 'assets/tilesets/mirror.png', { frameWidth: 9, frameHeight: 11 });
        this.load.spritesheet('chest', 'assets/tilesets/chest.png', { frameWidth: 14, frameHeight: 14 });
        this.load.spritesheet('book', 'assets/tilesets/book.png', { frameWidth: 13, frameHeight: 13 });
        this.load.spritesheet('small-bed', 'assets/tilesets/small-bed.png', { frameWidth: 14, frameHeight: 14 });
        this.load.spritesheet('huge-bed', 'assets/tilesets/small-bed.png', { frameWidth: 28, frameHeight: 14 });
        this.load.spritesheet('leather-armor', 'assets/tilesets/leather-armor.png', { frameWidth: 13, frameHeight: 13 });
        this.load.spritesheet('spider', 'assets/tilesets/spider.png', { frameWidth: 96, frameHeight: 13 });
        this.load.spritesheet('human-boss', 'assets/tilesets/human-boss.png', { frameWidth: 16, frameHeight: 16 });
        this.load.spritesheet('demon-boss', 'assets/images/demon-boss.png', { frameWidth: 48, frameHeight: 48 });
        this.load.spritesheet('bossHuman', 'assets/images/bossHuman.png', { frameWidth: 128, frameHeight: 128 });
        this.load.spritesheet('key', 'assets/tilesets/magicalkey.png', { frameWidth: 13, frameHeight: 13 });
        this.load.image('caveBackground', 'assets/images/caveBackground.jpg');
        this.load.image("bossBackground","assets/images/bossBackground.jpg")
        this.load.image("florestBackground","assets/images/florestBackground.jpg")
        this.load.image("background","assets/images/background.png")
        this.load.image('mask', 'assets/images/mask1.png');
        this.load.image('bat', 'assets/images/bat.png');
        this.load.image('ghost', 'assets/images/ghost.png');
        this.load.image('skeleton', 'assets/images/skeleton.png');
        this.load.image('demonboss', 'assets/images/demonboss.png');

        //Load nas musicas de background
        this.load.audio('WorldBackground', 'songs/world.mp3');
        this.load.plugin('InventModalPlugin', 'js/invent_plugin.js');
        this.load.plugin('DialogModalPlugin', 'js/dialog_plugin.js');
        this.load.plugin('FullScreenDialogModalPlugin', 'js/full_screen_dialog_plugin.js');
        
    },

    create: function ()
    {    
        debugger;
        var titlescreen = this.add.image(384, 192, "background");

        debugger;
        this.input.keyboard.on('keydown-ENTER', function (event) {
            console.log("Começou a aventura")
    
        });
        BKey = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.ENTER);
    },

    update: function (time, delta)
    {      
        if (BKey.isDown){
            
            this.scene.sleep();
            this.scene.start("HouseScene");
        }        

    },
   
});