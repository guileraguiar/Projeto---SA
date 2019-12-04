var BossScene = new Phaser.Class({

    Extends: Phaser.Scene,

    initialize:

    function BossScene ()
    {
        Phaser.Scene.call(this, { key: 'BossScene' });
    },

    preload: function ()
    {
        // map tiles
        this.load.image('boss-tiles', 'assets/tilesets/boss-tileset.png');
            
        // map in json format
        this.load.tilemapTiledJSON('boss-map', 'assets/tilemaps/boss-castle.json');

    },

    create: function ()
    {    
        
             // create the map
        const map = this.make.tilemap({ key: 'boss-map' });
        
        // first parameter is the name of the tilemap in tiled
        const tiles = map.addTilesetImage('boss-tileset', 'boss-tiles');
        
        // creating the layers
        const layerGround = map.createDynamicLayer('boss-ground', tiles, 0, 0);
        const layerCollide = map.createDynamicLayer('boss-collide', tiles, 0, 0);
        // const layerEvents = map.createDynamicLayer('events', tiles, 0, 0);
        
        // make all tiles in obstacles collidable
        layerCollide.setCollisionByExclusion([-1]);
        // layerEvents.setCollisionByProperty('scroll');

        this.anims.create({
            key: 'left',
            frames: this.anims.generateFrameNumbers('player', { frames: [1, 7, 1, 13] }),
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
        this.player = this.physics.add.sprite(376, 360, 'player', 6);

        this.king = this.physics.add.sprite(568, 56, 'npc');
        this.king.visible = false;

        this.humanBoss = this.physics.add.sprite(376, 56, 'human-boss');
        this.humanBoss.visible = true;

        this.demonBoss = this.physics.add.sprite(552, 184, 'demon-boss');
        this.demonBoss.visible = false;

        this.leaveBoss = this.physics.add.sprite(376, 380, 'door');
        this.leaveBoss.visible = false;
        
        InventoryKey = this.input.keyboard.addKey(Phaser.Input.Keyboard.KeyCodes.I);
       
        
        // don't go out of the map
        this.physics.world.bounds.width = map.widthInPixels;
        this.physics.world.bounds.height = map.heightInPixels;
        this.player.setCollideWorldBounds(true);
        
        // don't walk on walls
        this.physics.add.collider(this.player, layerCollide);
        // limit camera to map
        this.cameras.main.setBounds(0, 0, map.widthInPixels, map.heightInPixels);
        this.cameras.main.startFollow(this.player);
        this.cameras.main.roundPixels = true; // avoid tile bleed
    
        // user input
        this.cursors = this.input.keyboard.createCursorKeys();
        
        this.physics.add.overlap(this.player, this.leaveBoss, this.onLeaveBoss, false, this);
        this.physics.add.overlap(this.player, this.king, this.displayMessageKing, this.processCallback, this);
        this.physics.add.overlap(this.player, this.humanBoss, this.displayMessageBoss, this.processCallback, this);
        this.physics.add.overlap(this.player, this.demonBoss, this.displayMessageDemonBoss, this.processCallback, this);
        // we listen for 'wake' event
        this.sys.events.on('wake', this.wake, this);
       
        
    },
    wake: function() {
        this.cursors.left.reset();
        this.cursors.right.reset();
        this.cursors.up.reset();
        this.cursors.down.reset();
    },
    onLeaveCastle: function(player, zone) {   
        this.anims.remove('left');    
        this.anims.remove('right'); 
        this.anims.remove('up'); 
        this.anims.remove('down');     
        this.scene.sleep();
        this.scene.start('FlorestScene');
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

    displayMessageKing: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Rei Ianes diz:\nObrigado, grande guerreiro! Você salvou à mim e meu reinado desta terrível maldição. Eu cometi um erro grave ao vender minha alma à este demônio em troca da juventude eterna. Vamos, vamos voltar ao reinado para que possamos comemorar esta vitória!', true);
        this.dialog = true; 
    },
    displayMessageBoss: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('Homem diz:\nAlto lá! Daqui ninguém poderá passar. Se quiserem continuar, terão que me enfrentar.', true);
        this.dialog = true;
        this.humanBoss.destroy(); 
    },

    displayMessageDemonBoss: function() {
        this.player.body.setVelocityX(0);
        this.player.body.setVelocityY(0);
        this.sys.install('DialogModalPlugin');
        this.sys.dialogModal.init();
        this.sys.dialogModal.setText('??? diz:\nVocê não pensou que seria tão fácil, pensou?\nCONHEÇA MINHA VERDADEIRA FORMA!!!!', true);
        this.dialog = true;
        this.demonBoss.destroy(); 
    },
    onMeetBoss: function(player, zone) {    
            this.player.body.setVelocityX(0);
            this.player.body.setVelocityY(0);
            this.sys.install('DialogModalPlugin');
            this.sys.dialogModal.init();
            this.sys.dialogModal.setText('Homem diz:\nAlto lá! Daqui ninguém poderá passar. Se quiserem continuar, terão que me enfrentar. ', true);
            this.dialog = true;
            this.cameras.main.shake(300);    
            // we move the zone to some other location
            zone.x = Phaser.Math.RND.between(0, this.physics.world.bounds.width);
            zone.y = Phaser.Math.RND.between(0, this.physics.world.bounds.height);
            this.input.stopPropagation();
            // start battle 
            this.scene.switch('BattleScene');
            this.humanBoss.destroy();
       
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