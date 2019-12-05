var CaveScene = new Phaser.Class({

    Extends: Phaser.Scene,

    initialize:

    function CaveScene ()
    {
        Phaser.Scene.call(this, { key: 'CaveScene' });
    },

    preload: function ()
    {
        // map tiles
        this.load.image('cave-tiles', 'assets/tilesets/cave-tileset.png');
        this.load.image('caveMask', 'assets/images/caveMask.png');
        // map in json format
        this.load.tilemapTiledJSON('cave-map', 'assets/tilemaps/cave.json');
        
        
        // our two characters
        this.load.spritesheet('player', 'assets/tilesets/geraldo.png', { frameWidth: 16, frameHeight: 16 });
        this.load.spritesheet('door', 'assets/tilesets/woodDoor.png', { frameWidth: 16, frameHeight: 16 });

        this.load.plugin('DialogModalPlugin', 'js/dialog_plugin.js');
    },

    create: function ()
    {    

        
             // create the map
        const map = this.make.tilemap({ key: 'cave-map' });
        map.visible=false;
        // first parameter is the name of the tilemap in tiled
        const tiles = map.addTilesetImage('cave-tileset', 'cave-tiles');
        tiles.visible = false;
        // creating the layers
        const layerGround = map.createDynamicLayer('cave-ground', tiles, 0, 0);
        const layerCollide = map.createDynamicLayer('cave-collide', tiles, 0, 0);
        const layerEvents = map.createDynamicLayer('cave-events', tiles, 0, 0);
        layerCollide.visible=false;
        layerEvents.visible=false;
        layerGround.visible=false;
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
        this.player = this.physics.add.sprite(392, 376, 'player', 6);
        var player = this.player;
        this.leaveCave = this.physics.add.sprite(770, 294, 'door');
        this.leaveCave.visible = false;

        this.npc = this.physics.add.sprite(200, 120, 'npc');
        this.npc.visible = false;

        this.chest1 = this.physics.add.sprite(312, 104, 'chest');
        this.chest1.visible = false;
        
        this.chest2 = this.physics.add.sprite(328, 104, 'chest');
        this.chest2.visible = false;

        this.chest3 = this.physics.add.sprite(568, 360, 'chest');
        this.chest3.visible = false;

        this.chest4 = this.physics.add.sprite(728, 152, 'chest');
        this.chest4.visible = false;

        this.spider = this.physics.add.sprite(568, 330, 'spider');
        this.spider.visible = false;

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
        this.physics.add.overlap(this.player, this.spawns, this.onMeetEnemy, false, this);

        this.physics.add.overlap(this.player, this.leaveCave, this.onLeaveCave, false, this);
        this.physics.add.overlap(this.player, this.npc, this.displayMessageNPC, this.processCallback, this);
        this.physics.add.overlap(this.player, this.chest1, this.displayMessageChest1, this.processCallback, this);
        this.physics.add.overlap(this.player, this.chest2, this.displayMessageChest2, this.processCallback, this);
        this.physics.add.overlap(this.player, this.chest3, this.displayMessageChest3, this.processCallback, this);
        this.physics.add.overlap(this.player, this.chest4, this.displayMessageChest4, this.processCallback, this);
        this.physics.add.overlap(this.player, this.spider, this.onMeetSpider, this.processCallback, this);
        // we listen for 'wake' event
        this.sys.events.on('wake', this.wake, this);
        InventoryKey = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.I);
        var pic = this.add.image(384, 192, 'caveMask');

        // this.add.image(100, 60, 'cave-tiles');
    
        var spotlight = this.make.sprite({
            x: 384,
            y: 192,
            key: 'mask',
            add: false
        });
    
        pic.mask = new Phaser.Display.Masks.BitmapMask(this, spotlight);
    
        this.input.on('pointermove', function (pointer) {
    
            spotlight.x = pointer.x;
            spotlight.y = pointer.y;
    
        });
    
        this.tweens.add({
            targets: spotlight,
            alpha: 0,
            duration: 200000000000000000,
            ease: 'Sine.easeInOut',
            loop: -1,
            yoyo: false
        });
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
    displayMessageNPC: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Desconhecido diz:\nUma aranha gigantesca encontrará ao final desta caverna.\Ganhará derrotando-a, uma recompensa.', true);
        this.dialog = true; 
    },
    displayMessageChest1: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Baú:\n... Apenas pedras e carvão.', true);
        this.dialog = true;      
    },
    displayMessageChest2: function() {
        if (chestCave2==false) {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Baú:\nEncontrou Botas de Mithril.\n+4 de Defesa', true);
        this.dialog = true;
        chestCave2 = true;
        boots = "Botas de Mithril (+4 de Defesa)";
        def = def+4;
        console.log(def);
        }else{
            this.sys.install('DialogModalPlugin');
            this.sys.dialogModal.init();
            this.sys.dialogModal.setText('Aviso:\nVocê já abriu este baú.', true);
            this.dialog = true;
        }
    },
    displayMessageChest3: function() {
        if(chestCave3==false){
            chestCave3 = true;
            magicalKey += 1;
            this.player.body.setVelocityX(0);
            this.player.body.setVelocityY(0);
            this.sys.install('DialogModalPlugin');
            this.sys.dialogModal.init();
            this.sys.dialogModal.setText('Aviso:\nEncontrou 1 Chave Mágica.\nVocê possui '+magicalKey+' Chaves Mágicas', true);
            this.dialog = true;
            this.chest3.destroy()
        
        }else{
            this.sys.install('DialogModalPlugin');
            this.sys.dialogModal.init();
            this.sys.dialogModal.setText('Aviso:\nVocê já abriu este baú.', true);
            this.dialog = true;
            this.chest3.destroy()
        }
    },
    displayMessageChest4: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Baú:\nEncontrou uma nota[1/3]: "Cuidado com com o [...], ele [...] é quem diz ser, sua alma fora[...] para um [...]".', true);
        this.dialog = true;
    },

    onMeetSpider: function(player, zone) {    
        if (spider==false) {
            this.cameras.main.shake(300);  
            this.player.body.setVelocityX(0);
            this.player.body.setVelocityY(0);
            this.sys.install('DialogModalPlugin');
            this.sys.dialogModal.init();
            this.sys.dialogModal.setText('Miranha:\nVoCê EsTÁ peRturbANdo MeU AlmoOOçO!!!\nSE TORNARÁ ALMOÇO TAMBÉM!! SQUEEEEEEESHYHYY!!!! ', true);
            this.dialog = true;
            spider = true;
            this.cameras.main.shake(300);    
            // we move the zone to some other location
            zone.x = Phaser.Math.RND.between(0, this.physics.world.bounds.width);
            zone.y = Phaser.Math.RND.between(0, this.physics.world.bounds.height);
            this.input.stopPropagation();
            // start battle 
            this.scene.switch('BattleScene');
            this.spider.destroy();
        }else{
                this.sys.install('DialogModalPlugin');
                this.sys.dialogModal.init();
                this.sys.dialogModal.setText('Aviso:\nÉ apenas um cadáver.', true);
                this.dialog = true;
                this.spider.destroy();
            }
    },
    onMeetEnemy: function(player, zone) {        
        // we move the zone to some other location
        this.cameras.main.shake(300);  
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
    onLeaveCave: function(player, zone) {        
        this.scene.sleep();
        this.scene.start('WorldScene');
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