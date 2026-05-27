<footer class="bg-ink text-cream mt-20">

    
    <div class="border-b border-cream/10">
        <div class="container mx-auto px-4 py-6 grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
            <div class="flex items-center justify-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h.01M11 15h2m-7 4h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span class="font-semibold uppercase tracking-wider text-xs">Paiement sécurisé</span>
            </div>
            <div class="flex items-center justify-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9-4 9 4M5 9v10a2 2 0 002 2h10a2 2 0 002-2V9M9 21V12h6v9"/>
                </svg>
                <span class="font-semibold uppercase tracking-wider text-xs">Production éthique en Europe</span>
            </div>
            <div class="flex items-center justify-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                <span class="font-semibold uppercase tracking-wider text-xs">30 jours pour changer d'avis</span>
            </div>
        </div>
    </div>

    
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">

            
            <div>
                <h4 class="text-sm uppercase tracking-widest mb-4 font-bold">Espace client</h4>
                <ul class="space-y-2.5 text-sm text-cream/80">
                    <?php if(auth()->guard()->check()): ?>
                        <li><a href="<?php echo e(route('profile.edit')); ?>" class="hover:text-accent">Mon profil</a></li>
                        <li><a href="<?php echo e(route('orders.index')); ?>" class="hover:text-accent">Mes commandes</a></li>
                        <li>
                            <form action="<?php echo e(route('logout')); ?>" method="POST"><?php echo csrf_field(); ?>
                                <button class="hover:text-accent text-left">Se déconnecter</button>
                            </form>
                        </li>
                    <?php else: ?>
                        <li><a href="<?php echo e(route('login')); ?>" class="hover:text-accent">Se connecter</a></li>
                        <li><a href="<?php echo e(route('register')); ?>" class="hover:text-accent">Créer un compte</a></li>
                        <li><a href="<?php echo e(route('cart.index')); ?>" class="hover:text-accent">Mon panier</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            
            <div>
                <h4 class="text-sm uppercase tracking-widest mb-4 font-bold">Nos services</h4>
                <ul class="space-y-2.5 text-sm text-cream/80">
    <li><a href="<?php echo e(route('pages.show', 'livraison')); ?>" class="hover:text-accent">Modes et frais de livraison</a></li>
    <li><a href="<?php echo e(route('pages.show', 'paiement')); ?>" class="hover:text-accent">Moyens de paiement</a></li>
    <li><a href="<?php echo e(route('pages.show', 'retours')); ?>" class="hover:text-accent">Retours et remboursements</a></li>
    <li><a href="<?php echo e(route('pages.show', 'rse')); ?>" class="hover:text-accent">Nos engagements RSE</a></li>
</ul>
            </div>

            
<div>
    <h4 class="text-sm uppercase tracking-widest mb-4 font-bold">Aide & support</h4>
    <ul class="space-y-2.5 text-sm text-cream/80">
        <li><a href="<?php echo e(route('pages.show', 'contact')); ?>" class="hover:text-accent">Nous contacter</a></li>
        <li><a href="<?php echo e(route('pages.show', 'faq')); ?>" class="hover:text-accent">FAQ</a></li>
        <li><a href="<?php echo e(route('pages.show', 'guide-tailles')); ?>" class="hover:text-accent">Guide des tailles</a></li>
        <li><a href="<?php echo e(route('pages.show', 'about')); ?>" class="hover:text-accent">Qui sommes-nous ?</a></li>
    </ul>
</div>

            
            <div>
                <h4 class="text-sm uppercase tracking-widest mb-4 font-bold">Informations légales</h4>
                <ul class="space-y-2.5 text-sm text-cream/80">
                    <li><a href="#" class="hover:text-accent">Conditions générales de vente</a></li>
                    <li><a href="#" class="hover:text-accent">Mentions légales</a></li>
                    <li><a href="#" class="hover:text-accent">Politique de confidentialité</a></li>
                    <li><a href="<?php echo e(route('cookies.show')); ?>" class="hover:text-accent">Gérer mes cookies</a></li>
                </ul>
            </div>
        </div>

        
        <div class="border-t border-cream/10 mt-12 pt-8 grid md:grid-cols-2 gap-6 items-center">
            <div>
                <h3 class="text-3xl font-display mb-2">TEE<span class="text-accent">/</span>SHOP</h3>
                <p class="text-sm text-cream/70 max-w-md">T-shirts uniques, production éthique, livraison rapide en Belgique et UE.</p>
            </div>
            <div class="md:text-right">
                <p class="text-xs uppercase tracking-widest mb-3 text-cream/60">Suivez-nous</p>
                <div class="flex gap-3 md:justify-end">
                    <a href="https://facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url('/'))); ?>" target="_blank" rel="noopener" aria-label="Facebook"
                       class="w-9 h-9 border border-cream/30 flex items-center justify-center hover:bg-accent hover:border-accent transition font-bold">f</a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode(url('/'))); ?>&text=<?php echo e(urlencode('Découvrez TEE/SHOP')); ?>" target="_blank" rel="noopener" aria-label="Twitter"
                       class="w-9 h-9 border border-cream/30 flex items-center justify-center hover:bg-accent hover:border-accent transition">𝕏</a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo e(urlencode(url('/'))); ?>" target="_blank" rel="noopener" aria-label="LinkedIn"
                       class="w-9 h-9 border border-cream/30 flex items-center justify-center hover:bg-accent hover:border-accent transition font-bold">in</a>
                    <a href="https://wa.me/?text=<?php echo e(urlencode('Découvrez TEE/SHOP : ' . url('/'))); ?>" target="_blank" rel="noopener" aria-label="WhatsApp"
                       class="w-9 h-9 border border-cream/30 flex items-center justify-center hover:bg-accent hover:border-accent transition font-bold">W</a>
                </div>
            </div>
        </div>

    </div>

    
    <div class="bg-ink-soft border-t border-cream/10">
        <div class="container mx-auto px-4 py-5 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-cream/60">
            <p>© <?php echo e(date('Y')); ?> TEE/SHOP — Projet Groupe 3 — Tous droits réservés.</p>
            <div class="flex items-center gap-3">
                <span class="uppercase tracking-widest">Paiement :</span>
                <span class="px-2 py-1 bg-cream/10 font-mono">VISA</span>
                <span class="px-2 py-1 bg-cream/10 font-mono">MC</span>
                <span class="px-2 py-1 bg-cream/10 font-mono">AMEX</span>
                <span class="px-2 py-1 bg-cream/10 font-mono">Stripe</span>
            </div>
        </div>
    </div>
</footer><?php /**PATH C:\Users\simo-\Desktop\projet finale\resources\views/partials/footer.blade.php ENDPATH**/ ?>