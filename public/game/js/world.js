
var WorldScene = new Phaser.Class({

    Extends: Phaser.Scene,

    initialize:

    function WorldScene ()
    {
        Phaser.Scene.call(this, { key: 'WorldScene' });
    },

    preload: function ()
    {
            // map tiles
            this.load.image('tiles', 'assets/tilesets/colored.png');
        
            // map in json format
            this.load.tilemapTiledJSON('map', 'assets/tilemaps/town.json');
            
    },

    create: function ()
    {
        // var song = this.sound.add('WorldBackground');
        // var musicConfig = {
        //     mute: false,
        //     volume: 1,
        //     rate: 1,
        //     detune: 0,
        //     seek: 0,
        //     loop: true,
        //     delay: 0
        // }
        // song.play(musicConfig)
       
        
     
        // create the map
        const map = this.make.tilemap({ key: 'map' });
        
        // first parameter is the name of the tilemap in tiled
        const tiles = map.addTilesetImage('colored', 'tiles');
        
        // creating the layers
        const layerGround = map.createDynamicLayer('terrain', tiles, 0, 0);
        const layerWorld = map.createDynamicLayer('world', tiles, 0, 0);
        const layerCollide = map.createDynamicLayer('collide', tiles, 0, 0);
        const layerEvents = map.createDynamicLayer('eventsTown', tiles, 0, 0);
        
        // make all tiles in obstacles collidable
        layerCollide.setCollisionByExclusion([-1]);
        //layerEvents.setCollisionByExclusion([-1]);
        
        // const debugGraphics = this.add.graphics().setAlpha(0.75);
        
        //  animation with key 'left', we don't need left and right as we will use one and flip the sprite
        this.anims.create({
            key: 'left',
            frames: this.anims.generateFrameNumbers('player', { frames: [1, 7, 1, 13]}),
            frameRate: 10,
            repeat: -1
        });
        // animation with key 'right'
        this.anims.create({
            key: 'right',
            frames: this.anims.generateFrameNumbers('player', { frames: [1, 7, 1, 13] }),
            frameRate: 10,
            repeat: -1
        });
        this.anims.create({
            key: 'up',
            frames: this.anims.generateFrameNumbers('player', { frames: [2, 8, 2, 14]}),
            frameRate: 10,
            repeat: -1
        });
        this.anims.create({
            key: 'down',
            frames: this.anims.generateFrameNumbers('player', { frames: [ 0, 6, 0, 12 ] }),
            frameRate: 10,
            repeat: -1
        });        
        

        // our player sprite created through the phycis system
        
        switch (spawnPoint) {
        
            case 'castle':
                spawnPoint = map.findObject("spawn-castle", obj => obj.name === "spawnCastle");
            break;

            case 'house':
                spawnPoint = map.findObject("spawn-house", obj => obj.name === "spawnHouse");
            break;
            
            case 'cave':
                spawnPoint = map.findObject("spawn-cave", obj => obj.name === "spawnCave");
            break;
            
            case 'tavern':
                spawnPoint = map.findObject("spawn-tavern", obj => obj.name === "spawnTavern");
            break;

            case 'florest':
                spawnPoint = map.findObject("spawn-florest", obj => obj.name === "spawnFlorest");
            break;

            case 'florest2':
                spawnPoint = map.findObject("spawn-florest2", obj => obj.name === "spawnFlorest2");
            break;

            default:
                console.log('erro nos cases');
        }
        this.player = this.physics.add.sprite(spawnPoint.x, spawnPoint.y, 'player', 8);
        


        // don't go out of the map
        this.physics.world.bounds.width = map.widthInPixels;
        this.physics.world.bounds.height = map.heightInPixels;
        this.player.setCollideWorldBounds(true);
        
        // don't walk on trees
        this.physics.add.collider(this.player, layerCollide);
        this.physics.add.collider(this.player, layerEvents);

        // limit camera to map
        this.cameras.main.setBounds(0, 0, map.widthInPixels, map.heightInPixels);
        this.cameras.main.startFollow(this.player);
        this.cameras.main.roundPixels = true; // avoid tile bleed


        // user input
        this.cursors = this.input.keyboard.createCursorKeys();
        //Eventos do mapa
        this.enterCastle = this.physics.add.sprite(200, 68, 'door');
        this.enterCastle.visible = false;

        this.readScroll = this.physics.add.sprite(232, 68, 'scroll');
        this.readScroll.visible = false;

        this.enterHouse = this.physics.add.sprite(440, 275, 'door');
        this.enterHouse.visible = false;

        this.enterTavern = this.physics.add.sprite(296, 227, 'door');
        this.enterTavern.visible = false;

        this.enterCave = this.physics.add.sprite(736, 177, 'door');
        this.enterCave.visible = false;

        this.enterFlorest1 = this.physics.add.sprite(696, 385, 'door');
        this.enterFlorest1.visible = false;

        this.enterFlorest2 = this.physics.add.sprite(-2, 248, 'door');
        this.enterFlorest2.visible = false;
        
        // add collider
        // this.physics.add.overlap(this.player, this.spawns, this.onMeetEnemy, false, this);
        // this.physics.add.overlap(this.player, this.castle, this.onEnterCastle, false, this);
        this.physics.add.overlap(this.player, this.enterCastle, this.onEnterCastle, false, this);
        this.physics.add.overlap(this.player, this.enterHouse, this.onEnterHouse, false, this);
        this.physics.add.overlap(this.player, this.enterTavern, this.onEnterTavern, false, this);
        this.physics.add.overlap(this.player, this.enterCave, this.onEnterCave, false, this);
        this.physics.add.overlap(this.player, this.enterFlorest1, this.onEnterFlorest1, false, this);
        this.physics.add.overlap(this.player, this.enterFlorest2, this.onEnterFlorest2, false, this);
        this.physics.add.overlap(this.player, this.readScroll, this.onReadScroll, this.processCallback, this);
        InventoryKey = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.I);
      
        // we listen for 'wake' event
        this.sys.events.on('wake', this.wake, this);
        
    },

    processCallback: function(gameObject1, gameObject2) {
        
        if(this.dialog){
            gameObject1.x -= ((gameObject2.x - gameObject1.x)/3);
            gameObject1.y -= ((gameObject2.y - gameObject1.y)/3);
           
            var timer = this.time.addEvent({
                delay: 1000,                // ms
                callback: this.dialogCallback,
                callbackScope: this,
                loop: false
            });
            return false;  // return false will discard remaining collision checking
        }
        else
            return true;
    },
    openInvetory : function(){
        InventoryKey = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.I);
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        console.log("inventario aberto");
        this.sys.install('InventModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('## INVENTÁRIO ##\n\nArmadura: '+armor+'\nBotas: '+boots+'\nEspada: '+weapon+'\n\n## STATUS ##\n\nVida: '+hp+'\nMana: '+mana+'\nAtaque: '+atk+'\nDefesa: '+def, true);
        this.dialog = true; 
        
    
    },
    dialogCallback : function(){
        this.dialog = false;
    },

    onReadScroll: function(){
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('#Ano 1477#\nO Rei foi raptado e não se sabe nada sobre o sequestrante.\nÉ suspeito que seja por causa das riquezas...', true);
        this.dialog = true; 
    },

    wake: function() {
        this.cursors.left.reset();
        this.cursors.right.reset();
        this.cursors.up.reset();
        this.cursors.down.reset();
    },
    onEnterCastle: function(player, zone) {
             
        this.anims.remove('left');    
        this.anims.remove('right'); 
        this.anims.remove('up'); 
        this.anims.remove('down'); 
        spawnPoint = "castle";
        this.scene.sleep();
        this.scene.start('CastleScene');
    
    },

    onEnterHouse: function(player, zone) {    
       
        this.anims.remove('left');    
        this.anims.remove('right'); 
        this.anims.remove('up'); 
        this.anims.remove('down');
        spawnPoint = "house"; 
        this.scene.sleep(); 
        this.scene.start('HouseScene');
        
    },

    onEnterFlorest1: function(player, zone) {  
        backgroundSet = "florest";
        this.anims.remove('left');    
        this.anims.remove('right'); 
        this.anims.remove('up'); 
        this.anims.remove('down');
        spawnPoint = "florest2";
        spawnFlorest = "spawn2"
        this.scene.sleep(); 
        this.scene.start('FlorestScene');
        
    },
    onEnterFlorest2: function(player, zone) {  
        backgroundSet = "florest"
        this.anims.remove('left');    
        this.anims.remove('right'); 
        this.anims.remove('up'); 
        this.anims.remove('down');
        spawnPoint = "florest";
        spawnFlorest = "spawn1"
        this.scene.sleep(); 
        this.scene.start('FlorestScene');
        
    },

    onEnterTavern: function(player, zone) {  
       
        this.anims.remove('left');    
        this.anims.remove('right'); 
        this.anims.remove('up'); 
        this.anims.remove('down');
        spawnPoint = "tavern";   
        this.scene.sleep();      
        this.scene.start('TavernScene');
      
    },

    onEnterCave: function(player, zone) {  
        backgroundSet = "cave";
        this.anims.remove('left');    
        this.anims.remove('right'); 
        this.anims.remove('up'); 
        this.anims.remove('down');
        spawnPoint = "cave";     
        this.scene.sleep();   
        this.scene.start('CaveScene');
        
    },

    update: function (time, delta)
    {         
        if(InventoryKey.isDown){
            InventoryKey = undefined;
            this.openInvetory();
        }    
        this.player.body.setVelocity(0);
        // Horizontal movement
        if (this.cursors.left.isDown)
        {
            this.player.body.setVelocityX(-90);
        }
        else if (this.cursors.right.isDown)
        {
            this.player.body.setVelocityX(90);
        }
        // Vertical movement
        if (this.cursors.up.isDown)
        {
            this.player.body.setVelocityY(-90);
        }
        else if (this.cursors.down.isDown)
        {
            this.player.body.setVelocityY(90);
        }        

        // Update the animation last and give left/right animations precedence over up/down animations
        if (this.cursors.left.isDown)
        {
            this.player.anims.play('left', true);
            this.player.flipX = true;
        }
        else if (this.cursors.right.isDown)
        {
            this.player.anims.play('right', true);
            this.player.flipX = false;
        }
        else if (this.cursors.up.isDown)
        {
            this.player.anims.play('up', true);
        }
        else if (this.cursors.down.isDown)
        {
            this.player.anims.play('down', true);
            
        }
        else
        {
            this.player.anims.stop();
        }
        
        
    }

    
});

