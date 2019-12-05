var FlorestScene = new Phaser.Class({

    Extends: Phaser.Scene,

    initialize:

    function FlorestScene ()
    {
        Phaser.Scene.call(this, { key: 'FlorestScene' });
    },

    preload: function ()
    {
        // map tiles
        this.load.image('florest-tiles', 'assets/tilesets/colored.png');
            
        // map in json format
        this.load.tilemapTiledJSON('florest-map', 'assets/tilemaps/florest.json');
        
        
        // our two characters
        this.load.spritesheet('player', 'assets/tilesets/geraldo.png', { frameWidth: 16, frameHeight: 16 });
        this.load.spritesheet('door', 'assets/tilesets/woodDoor.png', { frameWidth: 16, frameHeight: 16 });

        this.load.plugin('DialogModalPlugin', 'js/dialog_plugin.js');
    },

    create: function ()
    {    
        
             // create the map
        const map = this.make.tilemap({ key: 'florest-map' });
        
        // first parameter is the name of the tilemap in tiled
        const tiles = map.addTilesetImage('colored', 'florest-tiles');
        
        // creating the layers
        const layerGround = map.createDynamicLayer('florest-ground', tiles, 0, 0);
        const layerCollide = map.createDynamicLayer('florest-collide', tiles, 0, 0);
        const layerEvents = map.createDynamicLayer('florest-events', tiles, 0, 0);
        
        // make all tiles in obstacles collidable
        layerCollide.setCollisionByExclusion([-1]);
        // layerEvents.setCollisionByProperty('scroll');

        // animation with key 'right'

        this.anims.create({
            key: 'left',
            frames: this.anims.generateFrameNumbers('player', { frames: [1, 7, 1, 13]}),
            frameRate: 10,
            repeat: -1
            
        });
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
        this.leaveFlorest1 = this.physics.add.sprite(0, 120, 'door');
        this.leaveFlorest1.visible = false;

        this.leaveFlorest2 = this.physics.add.sprite(664, 0, 'door');
        this.leaveFlorest2.visible = false;

        this.bosscastle = this.physics.add.sprite(40, 360, 'door');
        this.bosscastle.visible = false;

        this.deadnpc = this.physics.add.sprite(8, 264, 'npc');
        this.deadnpc.visible = false;

        this.goldKey = this.physics.add.sprite(744, 328, 'key');
        this.goldKey.visible = false;

        this.bluekeyhouse = this.physics.add.sprite(8, 40, 'key');
        if (houseKey==true) {
            this.bluekeyhouse.visible = false;
        }else{
            this.bluekeyhouse.visible = true;
        }


        switch (spawnFlorest) {
            case 'spawn1':
                spawnFlorest = map.findObject("spawn1", obj => obj.name === "spawn1");
            break;

            case 'spawn2':
                spawnFlorest = map.findObject("spawn2", obj => obj.name === "spawn2");
            break; 
            
            case 'spawn3':
                spawnFlorest = map.findObject("spawn3", obj => obj.name === "spawn3");
            break;

            

            default:
                console.log('erro nos cases');
        }
        this.player = this.physics.add.sprite(spawnFlorest.x, spawnFlorest.y, 'player', 6);
        
        // where the enemies will be
        this.spawns = this.physics.add.group({ classType: Phaser.GameObjects.Zone });
        for(var i = 0; i < 30; i++) {
            var x = Phaser.Math.RND.between(0, this.physics.world.bounds.width);
            var y = Phaser.Math.RND.between(0, this.physics.world.bounds.height);
            // parameters are x, y, width, height
            this.spawns.create(x, y, 20, 20);            
        } 
       
        
        // don't go out of the map
        this.physics.world.bounds.width = map.widthInPixels;
        this.physics.world.bounds.height = map.heightInPixels;
        this.player.setCollideWorldBounds(true);
        
        // don't walk on trees
        this.physics.add.collider(this.player, layerCollide);
        // limit camera to map
        this.cameras.main.setBounds(0, 0, map.widthInPixels, map.heightInPixels);
        this.cameras.main.startFollow(this.player);
        this.cameras.main.roundPixels = true; // avoid tile bleed
    
        // user input
        this.cursors = this.input.keyboard.createCursorKeys();
        
        //Eventos do mapa
        // this.physics.add.overlap(this.player, this.spawns, this.onMeetEnemy, false, this);

        this.physics.add.overlap(this.player, this.leaveFlorest1, this.onLeaveFlorest1, false, this);
        this.physics.add.overlap(this.player, this.leaveFlorest2, this.onLeaveFlorest2, false, this);
        this.physics.add.overlap(this.player, this.bosscastle, this.onEnterBossCastle, false, this);
        this.physics.add.overlap(this.player, this.deadnpc, this.displayMessageDeadNPC, this.processCallback, this);
        this.physics.add.overlap(this.player, this.goldKey, this.displayMessageGoldKey, this.processCallback, this);
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

    dialogCallback : function(){
        this.dialog = false;
    },
    displayMessageDeadNPC: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Você:\nÉ um cadáver... Parece ser do Comandante do Reinado.', true);
        this.dialog = true;
        this.deadnpc.destroy();
    },
    
    onMeetEnemy: function(player, zone) {        
        // we move the zone to some other location
        zone.x = Phaser.Math.RND.between(0, this.physics.world.bounds.width);
        zone.y = Phaser.Math.RND.between(0, this.physics.world.bounds.height);
        
        // shake the world
        this.cameras.main.shake(300);
        
        this.input.stopPropagation();
        // start battle 
        this.scene.switch('BattleScene');
    },
    wake: function() {
        this.cursors.left.reset();
        this.cursors.right.reset();
        this.cursors.up.reset();
        this.cursors.down.reset();
    },
    onLeaveFlorest1: function(player, zone) {    
        this.anims.remove('left');    
        this.anims.remove('right'); 
        this.anims.remove('up'); 
        this.anims.remove('down');     
        spawnPoint = "florest"
        this.scene.sleep();
        this.scene.start('WorldScene');
    },
    onLeaveFlorest2: function(player, zone) {      
        this.anims.remove('left');    
        this.anims.remove('right'); 
        this.anims.remove('up'); 
        this.anims.remove('down');   
        spawnPoint = "florest2"
        this.scene.sleep();
        this.scene.start('WorldScene');
    },
    onLeaveFlorest2: function(player, zone) {      
        this.anims.remove('left');    
        this.anims.remove('right'); 
        this.anims.remove('up'); 
        this.anims.remove('down');   
        spawnPoint = "florest2"
        this.scene.sleep();
        this.scene.start('WorldScene');
    },
    onEnterBossCastle: function(player, zone) {   
        backgroundSet = "boss";
        this.anims.remove('left');    
        this.anims.remove('right'); 
        this.anims.remove('up'); 
        this.anims.remove('down');
        spawnFlorest = "spawn3";
        spawnPoint = "boss";
        this.scene.sleep();
        this.scene.start('BossScene');
    },
    displayMessageGoldKey: function() {
        if(goldenKey==false){
            goldenKey = true;
            magicalKey += 1;
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Aviso:\nEncontrou 1 Chave Mágica.\nVocê possui '+magicalKey+' Chaves Mágicas', true);
        this.dialog = true;
        this.goldKey.destroy()
   
        }else{
            
            this.goldKey.destroy()
        }
    },
    displayMessageBlueKey: function() {
        if(houseKey==false){
            houseKey = true;
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Aviso:\nEncontrou uma Chave Azul.', true);
        this.dialog = true;
        this.bluekeyhouse.destroy()
   
        }else{
            
            this.bluekeyhouse.destroy()
        }
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
            this.player.body.setVelocityX(-45);
        }
        else if (this.cursors.right.isDown)
        {
            this.player.body.setVelocityX(45);
        }
        // Vertical movement
        if (this.cursors.up.isDown)
        {
            this.player.body.setVelocityY(-45);
        }
        else if (this.cursors.down.isDown)
        {
            this.player.body.setVelocityY(45);
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