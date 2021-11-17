<?php
namespace  CoffeeShop\Bundle\MakerCoffeeBundle\Command;
 
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class CoffeeCommand extends Command
{
    public static $defaultName = 'you:make:me:coffee';
    protected function configure(): void
    {
        $this ->setDescription('Make coffee for the wolrd')
              ->setHelp('Demonstration of custom commands created by Symfony Console component.');
    }
 
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $helper = $this->getHelper('question');

        $question = new ChoiceQuestion( 'quel café voulez vous ?', ['court', 'long', 'décaféiné']);
        $question->setErrorMessage(' nous n\'avons pas cela en sotck');

        $cafe = $helper->ask($input, $output, $question);
        if($cafe === 'décaféiné'){
            $outputStyle = new OutputFormatterStyle('red', 'black', ['bold', 'blink']);
            $output->getFormatter()->setStyle('fire', $outputStyle);

            $output->writeln('<fire>ce café n\'est pas pour les dev mais je vais faire une exception !</>');
           
        }
        $question = new ChoiceQuestion( 'un café '.$cafe.'! avec ou sans sucre ? ', ['avec sucre', 'sans sucre']);

        $sucre = $helper->ask($input, $output, $question);
        if($sucre === 'avec sucre'){
            $output->writeln('Je vous apporte cela tout de suite un café '.$cafe.' '.$sucre.', mangez 5 fruits et legumes par jours !');
        }else{
            $output->writeln('Je vous apporte cela tout de suite un café '.$cafe.' '.$sucre.', excellent choix');
        }
        return Command::SUCCESS;
        
    }
           
}